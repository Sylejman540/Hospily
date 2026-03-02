<?php

namespace App\Policies;

use App\Models\Appointment;
use App\Models\User;

class AppointmentPolicy
{
    /**
     * View appointment: admins, clinicians, and staff can view
     */
    public function view(User $user, Appointment $appointment): bool
    {
        return $appointment->facility_id === $user->facility_id;
    }

    /**
     * Create appointment: admins and clinicians only
     */
    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isClinician();
    }

    /**
     * Update appointment: admins and clinicians
     */
    public function update(User $user, Appointment $appointment): bool
    {
        return $appointment->facility_id === $user->facility_id 
            && ($user->isAdmin() || $user->isClinician());
    }

    /**
     * Only admins can delete appointments
     */
    public function delete(User $user, Appointment $appointment): bool
    {
        return $appointment->facility_id === $user->facility_id && $user->isAdmin();
    }
}
