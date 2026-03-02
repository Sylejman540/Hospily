<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

// Models
use App\Models\Department;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\HandoverAlert;

// Policies
use App\Policies\DepartmentPolicy;
use App\Policies\PatientPolicy;
use App\Policies\AppointmentPolicy;
use App\Policies\HandoverAlertPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Boot services - Register policies
     */
    public function boot(): void
    {
        Gate::policy(Department::class, DepartmentPolicy::class);
        Gate::policy(Patient::class, PatientPolicy::class);
        Gate::policy(Appointment::class, AppointmentPolicy::class);
        Gate::policy(HandoverAlert::class, HandoverAlertPolicy::class);
    }
}
