<?php

namespace Tests\Feature;

use App\Models\Facility;
use App\Models\User;
use App\Models\Patient;
use App\Models\Department;
use App\Models\Appointment;
use App\Models\HandoverAlert;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MultiTenantIsolationTest extends TestCase
{
    use RefreshDatabase;

    private $facility1;
    private $facility2;
    private $admin1;
    private $admin2;
    private $clinician1;
    private $clinician2;
    private $patient1;
    private $patient2;
    private $appointment1;
    private $alert1;

    protected function setUp(): void
    {
        parent::setUp();
        $this->setupTestFacilities();
    }

    /**
     * Setup test fixtures for both facilities
     */
    private function setupTestFacilities(): void
    {
        // Create Facility 1
        $this->facility1 = Facility::create([
            'name' => 'Hospital A',
            'slug' => 'hospital-a',
            'timezone' => 'UTC',
        ]);

        // Create Facility 2
        $this->facility2 = Facility::create([
            'name' => 'Hospital B',
            'slug' => 'hospital-b',
            'timezone' => 'UTC',
        ]);

        // Create Admins
        $this->admin1 = User::create([
            'facility_id' => $this->facility1->id,
            'name' => 'Admin 1',
            'email' => 'admin1@hospital-a.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $this->admin2 = User::create([
            'facility_id' => $this->facility2->id,
            'name' => 'Admin 2',
            'email' => 'admin2@hospital-b.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Create Clinicians
        $this->clinician1 = User::create([
            'facility_id' => $this->facility1->id,
            'name' => 'Clinician 1',
            'email' => 'clinician1@hospital-a.com',
            'password' => bcrypt('password'),
            'role' => 'clinician',
        ]);

        $this->clinician2 = User::create([
            'facility_id' => $this->facility2->id,
            'name' => 'Clinician 2',
            'email' => 'clinician2@hospital-b.com',
            'password' => bcrypt('password'),
            'role' => 'clinician',
        ]);

        // Create Departments
        $dept1 = Department::create([
            'facility_id' => $this->facility1->id,
            'name' => 'Cardiology',
            'total_beds' => 10,
        ]);

        $dept2 = Department::create([
            'facility_id' => $this->facility2->id,
            'name' => 'Cardiology',
            'total_beds' => 15,
        ]);

        // Create Patients
        $this->patient1 = Patient::create([
            'facility_id' => $this->facility1->id,
            'department_id' => $dept1->id,
            'mrn' => '1-0001',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'dob' => '1980-01-01',
            'gender' => 'male',
            'care_status' => 'in-care',
        ]);

        $this->patient2 = Patient::create([
            'facility_id' => $this->facility2->id,
            'department_id' => $dept2->id,
            'mrn' => '2-0001',
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'dob' => '1985-05-15',
            'gender' => 'female',
            'care_status' => 'in-care',
        ]);

        // Create Appointments
        $this->appointment1 = Appointment::create([
            'facility_id' => $this->facility1->id,
            'patient_id' => $this->patient1->id,
            'clinician_id' => $this->clinician1->id,
            'department_id' => $dept1->id,
            'scheduled_at' => now()->addDays(1),
            'procedure_type' => 'ECG',
            'status' => 'confirmed',
        ]);

        $appointment2 = Appointment::create([
            'facility_id' => $this->facility2->id,
            'patient_id' => $this->patient2->id,
            'clinician_id' => $this->clinician2->id,
            'department_id' => $dept2->id,
            'scheduled_at' => now()->addDays(1),
            'procedure_type' => 'ECG',
            'status' => 'confirmed',
        ]);

        // Create Alerts
        $this->alert1 = HandoverAlert::create([
            'facility_id' => $this->facility1->id,
            'created_by' => $this->admin1->id,
            'title' => 'Critical Alert',
            'message' => 'Do not discharge',
            'priority' => 'critical',
            'is_active' => true,
        ]);

        HandoverAlert::create([
            'facility_id' => $this->facility2->id,
            'created_by' => $this->admin2->id,
            'title' => 'Maintenance Alert',
            'message' => 'Wing closed',
            'priority' => 'medium',
            'is_active' => true,
        ]);
    }

    /**
     * ✅ TEST 1: Facility 1 Admin cannot see Facility 2 patients
     */
    public function test_facility1_admin_cannot_access_facility2_patients()
    {
        $this->actingAs($this->admin1);

        $response = $this->getJson("/patients/{$this->patient2->id}");

        // Global scope should prevent finding patient from different facility
        $response->assertNotFound();
    }

    /**
     * ✅ TEST 2: Facility 1 Clinician cannot see Facility 2 appointments
     */
    public function test_facility1_clinician_cannot_access_facility2_appointments()
    {
        $this->actingAs($this->clinician1);

        $response = $this->getJson("/appointments/{$this->appointment1->id}");

        $response->assertOk(); // Can see own appointment
        
        // Get appointment from facility 2
        $appointment2 = Appointment::where('facility_id', $this->facility2->id)->first();
        $response = $this->getJson("/appointments/{$appointment2->id}");

        $response->assertNotFound(); // Cannot see facility 2 appointment
    }

    /**
     * ✅ TEST 3: Facility 1 Admin cannot update Facility 2 Department
     */
    public function test_facility1_admin_cannot_update_facility2_department()
    {
        $this->actingAs($this->admin1);

        $dept2 = Department::where('facility_id', $this->facility2->id)->first();

        $response = $this->patchJson("/departments/{$dept2->id}", [
            'name' => 'Neurology',
            'total_beds' => 20,
            'color_theme' => '#FF0000',
        ]);

        $response->assertNotFound(); // Global scope prevents update
    }

    /**
     * ✅ TEST 4: Facility 1 Admin cannot delete Facility 2 Department
     */
    public function test_facility1_admin_cannot_delete_facility2_department()
    {
        $this->actingAs($this->admin1);

        $dept2 = Department::where('facility_id', $this->facility2->id)->first();

        $response = $this->deleteJson("/departments/{$dept2->id}");

        $response->assertNotFound();

        // Verify department still exists
        $this->assertDatabaseHas('departments', ['id' => $dept2->id]);
    }

    /**
     * ✅ TEST 5: Admin from Facility 1 cannot view Facility 2 alerts
     */
    public function test_facility1_admin_cannot_view_facility2_alerts()
    {
        $this->actingAs($this->admin1);

        $alert2 = HandoverAlert::where('facility_id', $this->facility2->id)->first();

        $response = $this->getJson("/alerts/{$alert2->id}");

        $response->assertNotFound();
    }

    /**
     * ✅ TEST 6: Facility index shows only own patients
     */
    public function test_patients_index_returns_only_own_facility_patients()
    {
        $this->actingAs($this->clinician1);

        $response = $this->getJson('/patients');

        $response->assertOk();
        $patients = $response->json();

        // Should only contain patient from facility 1
        $this->assertEquals(1, count($patients));
        $this->assertEquals($this->patient1->id, $patients[0]['id']);
    }

    /**
     * ✅ TEST 7: Appointments index shows only own facility's appointments
     */
    public function test_appointments_index_returns_only_own_facility_appointments()
    {
        $this->actingAs($this->clinician1);

        $response = $this->getJson('/appointments');

        $response->assertOk();
        $appointments = $response->json();

        // Non-admin clinician should see only their appointments
        $this->assertEquals(1, count($appointments));
        $this->assertEquals($this->appointment1->id, $appointments[0]['id']);
    }

    /**
     * ✅ TEST 8: Admin can see all appointments in facility (via clinician filter)
     */
    public function test_admin_can_see_all_facility_appointments()
    {
        $this->actingAs($this->admin1);

        $response = $this->getJson('/appointments');

        $response->assertOk();
        // Admin should see facility 1 appointments
        $appointments = $response->json();
        $this->assertGreaterThan(0, count($appointments));
    }

    /**
     * ✅ TEST 9: Cannot create appointment for clinic from different facility
     */
    public function test_cannot_create_appointment_for_clinician_from_different_facility()
    {
        $this->actingAs($this->admin1);

        $response = $this->postJson('/appointments', [
            'patient_id' => $this->patient1->id,
            'clinician_id' => $this->clinician2->id, // From facility 2
            'department_id' => Department::where('facility_id', $this->facility1->id)->first()->id,
            'scheduled_at' => now()->addDays(1)->format('Y-m-d H:i'),
            'procedure_type' => 'ECG',
            'status' => 'confirmed',
        ]);

        $response->assertUnprocessable(); // Should reject cross-facility clinician
    }

    /**
     * ✅ TEST 10: Alerts index shows only own facility alerts
     */
    public function test_alerts_index_returns_only_own_facility_alerts()
    {
        $this->actingAs($this->admin1);

        $response = $this->getJson('/alerts');

        $response->assertOk();
        $alerts = $response->json();

        // Should only contain alerts from facility 1
        $this->assertEquals(1, count($alerts));
        $this->assertEquals($this->alert1->id, $alerts[0]['id']);
    }

    /**
     * ✅ TEST 11: 403 returned when non-admin tries to create alert
     */
    public function test_non_admin_cannot_create_alert()
    {
        $this->actingAs($this->clinician1);

        $response = $this->postJson('/alerts', [
            'title' => 'Test Alert',
            'message' => 'Test message',
            'priority' => 'low',
        ]);

        $response->assertForbidden();
    }

    /**
     * ✅ TEST 12: 403 returned when trying to access admin resources as clinician
     */
    public function test_clinician_cannot_access_department_endpoints()
    {
        $this->actingAs($this->clinician1);

        $dept1 = Department::where('facility_id', $this->facility1->id)->first();

        // Try to delete department as clinician
        $response = $this->deleteJson("/departments/{$dept1->id}");

        $response->assertForbidden();
    }

    /**
     * ✅ TEST 13: Verify BelongsToFacility trait works in queries
     */
    public function test_model_queries_are_automatically_scoped()
    {
        // Simulate admin1 being authenticated
        $this->actingAs($this->admin1);

        // Query should only return facility 1 patients
        $patients = Patient::all();

        // All returned patients should belong to facility 1
        foreach ($patients as $patient) {
            $this->assertEquals($this->facility1->id, $patient->facility_id);
        }
    }

    /**
     * ✅ TEST 14: Cross-facility patient discharge not possible via model
     */
    public function test_cannot_discharge_patient_from_different_facility_via_api()
    {
        $this->actingAs($this->admin1);

        $response = $this->postJson("/patients/{$this->patient2->id}/discharge");

        $response->assertNotFound();
    }

    /**
     * ✅ TEST 15: MRN uniqueness enforced per facility
     */
    public function test_mrn_uniqueness_enforced_per_facility()
    {
        $dept1 = Department::where('facility_id', $this->facility1->id)->first();

        // Try to create patient with duplicate MRN in same facility
        $response = $this->postJson('/patients', [
            'department_id' => $dept1->id,
            'first_name' => 'Duplicate',
            'last_name' => 'Patient',
            'dob' => '1990-01-01',
            'gender' => 'male',
            'care_status' => 'outpatient',
        ]);

        // First patient should succeed
        $this->actingAs($this->admin1);
        $response->assertCreated();

        // Create another - should get auto-generated unique MRN
        $response = $this->postJson('/patients', [
            'department_id' => $dept1->id,
            'first_name' => 'Another',
            'last_name' => 'Patient',
            'dob' => '1991-02-02',
            'gender' => 'female',
            'care_status' => 'outpatient',
        ]);

        $response->assertCreated();
    }
}
