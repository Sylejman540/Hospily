<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facility;
use App\Models\User;
use App\Models\Department;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\HandoverAlert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class FacilitySeeder extends Seeder
{
    /**
     * Run the seeder - creates 2 facilities with all test data
     */
    public function run(): void
    {
        // ===== FACILITY 1 =====
        $facility1 = Facility::create([
            'name' => 'City General Hospital',
            'slug' => Str::slug('City General Hospital'),
            'address' => '123 Main Street',
            'city' => 'New York',
            'country' => 'USA',
            'timezone' => 'America/New_York',
        ]);

        // Admin for Facility 1
        $admin1 = User::create([
            'facility_id' => $facility1->id,
            'name' => 'Dr. Alice Johnson',
            'email' => 'alice@cityhospital.com',
            'password' => Hash::make('SecurePass123!'),
            'role' => 'admin',
        ]);

        // Clinician for Facility 1
        $clinician1 = User::create([
            'facility_id' => $facility1->id,
            'name' => 'Dr. James Smith',
            'email' => 'james@cityhospital.com',
            'password' => Hash::make('SecurePass123!'),
            'role' => 'clinician',
        ]);

        // Create departments for Facility 1
        $dept1_1 = Department::create([
            'facility_id' => $facility1->id,
            'name' => 'Cardiology',
            'total_beds' => 15,
            'color_theme' => '#FF6B6B',
        ]);

        $dept1_2 = Department::create([
            'facility_id' => $facility1->id,
            'name' => 'Neurology',
            'total_beds' => 10,
            'color_theme' => '#4ECDC4',
        ]);

        // Create 5 patients for Facility 1
        $patients1 = [];
        $patientData1 = [
            ['first' => 'John', 'last' => 'Doe', 'dept' => $dept1_1->id],
            ['first' => 'Jane', 'last' => 'Smith', 'dept' => $dept1_2->id],
            ['first' => 'Robert', 'last' => 'Brown', 'dept' => $dept1_1->id],
            ['first' => 'Mary', 'last' => 'Wilson', 'dept' => $dept1_2->id],
            ['first' => 'Michael', 'last' => 'Davis', 'dept' => $dept1_1->id],
        ];

        foreach ($patientData1 as $idx => $data) {
            $patient = Patient::create([
                'facility_id' => $facility1->id,
                'department_id' => $data['dept'],
                'mrn' => "{$facility1->id}-" . str_pad($idx + 1, 4, '0', STR_PAD_LEFT),
                'first_name' => $data['first'],
                'last_name' => $data['last'],
                'dob' => now()->subYears(rand(25, 75)),
                'gender' => rand(0, 1) ? 'male' : 'female',
                'care_status' => ['outpatient', 'in-care', 'critical'][rand(0, 2)],
                'admitted_at' => now()->subDays(rand(1, 30)),
            ]);
            $patients1[] = $patient;
        }

        // Create 5 appointments for Facility 1
        foreach ($patients1 as $idx => $patient) {
            Appointment::create([
                'facility_id' => $facility1->id,
                'patient_id' => $patient->id,
                'clinician_id' => $clinician1->id,
                'department_id' => $patient->department_id,
                'scheduled_at' => now()->addDays(rand(1, 30)),
                'procedure_type' => ['ECG', 'MRI Scan', 'Consultation', 'Surgery', 'Check-up'][$idx],
                'status' => ['confirmed', 'urgent', 'pending'][$idx % 3],
                'notes' => "Routine appointment for patient {$patient->first_name}",
            ]);
        }

        // Create 2 alerts for Facility 1
        HandoverAlert::create([
            'facility_id' => $facility1->id,
            'created_by' => $admin1->id,
            'title' => 'Critical: Check all cardiac patients',
            'message' => 'All cardiac patients must have blood pressure checked before discharge.',
            'priority' => 'critical',
            'expires_at' => now()->addDays(7),
            'is_active' => true,
        ]);

        HandoverAlert::create([
            'facility_id' => $facility1->id,
            'created_by' => $admin1->id,
            'title' => 'Maintenance: West Wing unavailable',
            'message' => 'West wing will be under maintenance from March 5-8. Please route patients to East wing.',
            'priority' => 'medium',
            'expires_at' => now()->addDays(3),
            'is_active' => true,
        ]);

        // ===== FACILITY 2 =====
        $facility2 = Facility::create([
            'name' => 'St. Mary\'s Medical Center',
            'slug' => Str::slug('St. Mary\'s Medical Center'),
            'address' => '456 Oak Avenue',
            'city' => 'Los Angeles',
            'country' => 'USA',
            'timezone' => 'America/Los_Angeles',
        ]);

        // Admin for Facility 2
        $admin2 = User::create([
            'facility_id' => $facility2->id,
            'name' => 'Dr. Sarah Williams',
            'email' => 'sarah@stmarys.com',
            'password' => Hash::make('SecurePass123!'),
            'role' => 'admin',
        ]);

        // Clinician for Facility 2
        $clinician2 = User::create([
            'facility_id' => $facility2->id,
            'name' => 'Dr. Michael Lee',
            'email' => 'michael@stmarys.com',
            'password' => Hash::make('SecurePass123!'),
            'role' => 'clinician',
        ]);

        // Create departments for Facility 2
        $dept2_1 = Department::create([
            'facility_id' => $facility2->id,
            'name' => 'Orthopedics',
            'total_beds' => 20,
            'color_theme' => '#45B7D1',
        ]);

        $dept2_2 = Department::create([
            'facility_id' => $facility2->id,
            'name' => 'General Medicine',
            'total_beds' => 25,
            'color_theme' => '#96CEB4',
        ]);

        // Create 5 patients for Facility 2
        $patients2 = [];
        $patientData2 = [
            ['first' => 'Patricia', 'last' => 'Miller', 'dept' => $dept2_1->id],
            ['first' => 'Christopher', 'last' => 'Taylor', 'dept' => $dept2_2->id],
            ['first' => 'Linda', 'last' => 'Anderson', 'dept' => $dept2_1->id],
            ['first' => 'David', 'last' => 'Thomas', 'dept' => $dept2_2->id],
            ['first' => 'Barbara', 'last' => 'Jackson', 'dept' => $dept2_1->id],
        ];

        foreach ($patientData2 as $idx => $data) {
            $patient = Patient::create([
                'facility_id' => $facility2->id,
                'department_id' => $data['dept'],
                'mrn' => "{$facility2->id}-" . str_pad($idx + 1, 4, '0', STR_PAD_LEFT),
                'first_name' => $data['first'],
                'last_name' => $data['last'],
                'dob' => now()->subYears(rand(25, 75)),
                'gender' => rand(0, 1) ? 'male' : 'female',
                'care_status' => ['outpatient', 'in-care', 'recovery'][rand(0, 2)],
                'admitted_at' => now()->subDays(rand(1, 30)),
            ]);
            $patients2[] = $patient;
        }

        // Create 5 appointments for Facility 2
        foreach ($patients2 as $idx => $patient) {
            Appointment::create([
                'facility_id' => $facility2->id,
                'patient_id' => $patient->id,
                'clinician_id' => $clinician2->id,
                'department_id' => $patient->department_id,
                'scheduled_at' => now()->addDays(rand(1, 30)),
                'procedure_type' => ['X-Ray', 'Surgery', 'Physical Therapy', 'Lab Work', 'Follow-up'][$idx],
                'status' => ['confirmed', 'pending', 'urgent'][$idx % 3],
                'notes' => "Appointment details for patient {$patient->first_name}",
            ]);
        }

        // Create 2 alerts for Facility 2
        HandoverAlert::create([
            'facility_id' => $facility2->id,
            'created_by' => $admin2->id,
            'title' => 'Staff Alert: New Protocol',
            'message' => 'New discharge protocol effective March 3rd. See admin for details.',
            'priority' => 'low',
            'expires_at' => now()->addDays(14),
            'is_active' => true,
        ]);

        HandoverAlert::create([
            'facility_id' => $facility2->id,
            'created_by' => $admin2->id,
            'title' => 'Equipment: MRI machine schedule',
            'message' => 'MRI machine scheduled maintenance on March 6. Book early.',
            'priority' => 'medium',
            'expires_at' => now()->addDays(4),
            'is_active' => true,
        ]);

        $this->command->info('✅ Database seeded successfully!');
        $this->command->info("\n📊 Created:");
        $this->command->info("   • 2 Facilities");
        $this->command->info("   • 2 Admins (1 per facility)");
        $this->command->info("   • 2 Clinicians (1 per facility)");
        $this->command->info("   • 10 Patients (5 per facility)");
        $this->command->info("   • 10 Appointments (5 per facility)");
        $this->command->info("   • 4 Alerts (2 per facility)");
        $this->command->info("\n🔑 Test Credentials:");
        $this->command->info("   Facility 1 Admin: alice@cityhospital.com / SecurePass123!");
        $this->command->info("   Facility 1 Clinician: james@cityhospital.com / SecurePass123!");
        $this->command->info("   Facility 2 Admin: sarah@stmarys.com / SecurePass123!");
        $this->command->info("   Facility 2 Clinician: michael@stmarys.com / SecurePass123!");
    }
}
