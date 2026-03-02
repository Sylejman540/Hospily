<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Department;
use App\Models\Appointment;
use App\Models\HandoverAlert;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display dashboard with real data scoped to authenticated user's facility
     * 
     * All data is automatically scoped to facility via BelongsToFacility trait
     */
    public function index()
    {
        $facilityId = auth()->user()->facility_id;

        // Active patients (not discharged)
        $activePatients = Patient::whereNull('discharged_at')->count();

        // Total departments
        $totalDepartments = Department::count();

        // Appointments today
        $appointmentsToday = Appointment::whereBetween('scheduled_at', [
            now()->startOfDay(),
            now()->endOfDay(),
        ])->count();

        // Active alerts (not expired, is_active = true)
        $activeAlerts = HandoverAlert::active()->count();

        // Recent patients (last 5)
        $recentPatients = Patient::with('department')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        // Upcoming appointments (next 7 days)
        $upcomingAppointments = Appointment::with('patient', 'clinician', 'department')
            ->whereBetween('scheduled_at', [
                now()->startOfDay(),
                now()->addDays(7)->endOfDay(),
            ])
            ->orderBy('scheduled_at')
            ->get();

        // Urgent appointments (status = urgent, next 3 days)
        $urgentAppointments = Appointment::with('patient', 'clinician')
            ->where('status', 'urgent')
            ->whereBetween('scheduled_at', [
                now()->startOfDay(),
                now()->addDays(3)->endOfDay(),
            ])
            ->orderBy('scheduled_at')
            ->get();

        // Critical alerts
        $criticalAlerts = HandoverAlert::active()
            ->where('priority', 'critical')
            ->get();

        // Patient care status breakdown
        $patientsByStatus = Patient::select('care_status')
            ->groupBy('care_status')
            ->selectRaw('care_status, COUNT(*) as total')
            ->get()
            ->keyBy('care_status');

        // Appointments by status (active only)
        $appointmentsByStatus = Appointment::active()
            ->select('status')
            ->groupBy('status')
            ->selectRaw('status, COUNT(*) as total')
            ->get()
            ->keyBy('status');

        // Calculate available beds
        $totalBeds = Department::sum('total_beds');
        $occupiedBeds = Patient::whereNull('discharged_at')->count();
        $availableBeds = max(0, $totalBeds - $occupiedBeds);

        return view('dashboard.dashboard', [
            'activePatients' => $activePatients,
            'totalDepartments' => $totalDepartments,
            'appointmentsToday' => $appointmentsToday,
            'activeAlerts' => $activeAlerts,
            'recentPatients' => $recentPatients,
            'upcomingAppointments' => $upcomingAppointments,
            'urgentAppointments' => $urgentAppointments,
            'criticalAlerts' => $criticalAlerts,
            'patientsByStatus' => $patientsByStatus,
            'appointmentsByStatus' => $appointmentsByStatus,
            'availableBeds' => $availableBeds,
            'occupiedBeds' => $occupiedBeds,
            'totalBeds' => $totalBeds,
            'facilityId' => $facilityId,
        ]);
    }

    /**
     * Get dashboard statistics as JSON (for API calls)
     */
    public function data()
    {
        $facilityId = auth()->user()->facility_id;

        // Active patients (not discharged)
        $activePatients = Patient::whereNull('discharged_at')->count();

        // Total departments
        $totalDepartments = Department::count();

        // Appointments today
        $appointmentsToday = Appointment::whereBetween('scheduled_at', [
            now()->startOfDay(),
            now()->endOfDay(),
        ])->count();

        // Active alerts (not expired, is_active = true)
        $activeAlerts = HandoverAlert::active()->count();

        return response()->json([
            'stats' => [
                'active_patients' => $activePatients,
                'total_departments' => $totalDepartments,
                'appointments_today' => $appointmentsToday,
                'active_alerts' => $activeAlerts,
            ],
            'facility_id' => $facilityId,
            'timestamp' => now()->toIso8601String(),
        ]);
    }

    /**
     * Get dashboard chart data
     */
    public function chartData()
    {
        // Weekly patient admission trend
        $weeklyAdmissions = Patient::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(function ($item) {
                return [
                    'date' => $item->date,
                    'count' => $item->count,
                ];
            });

        // Department bed occupancy
        $departmentOccupancy = Department::with('patients')
            ->get()
            ->map(function ($dept) {
                $occupiedBeds = $dept->patients()->whereNull('discharged_at')->count();
                return [
                    'department' => $dept->name,
                    'total_beds' => $dept->total_beds,
                    'occupied_beds' => $occupiedBeds,
                    'available_beds' => $dept->total_beds - $occupiedBeds,
                    'occupancy_rate' => $dept->total_beds > 0 
                        ? round(($occupiedBeds / $dept->total_beds) * 100, 1)
                        : 0,
                ];
            });

        return response()->json([
            'weekly_admissions' => $weeklyAdmissions,
            'department_occupancy' => $departmentOccupancy,
        ]);
    }

    /**
     * Quick summary for header
     */
    public function summary()
    {
        return response()->json([
            'active_patients' => Patient::whereNull('discharged_at')->count(),
            'today_appointments' => Appointment::whereBetween('scheduled_at', [
                now()->startOfDay(),
                now()->endOfDay(),
            ])->count(),
            'urgent_alerts' => HandoverAlert::active()
                ->whereIn('priority', ['critical', 'medium'])
                ->count(),
        ]);
    }
}
