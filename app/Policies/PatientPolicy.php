<?php

namespace App\Policies;

use App\Models\Patient;
use App\Models\User;

class PatientPolicy
{
    /**
     * Admins and clinicians can view patients
     */
    public function view(User $user, Patient $patient): bool
    {
        // Must belong to same facility
        return $patient->facility_id === $user->facility_id;
    }

    /**
     * Admins and clinicians can create patients
     */
    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isClinician();
    }

    /**
     * Admins and clinicians can update patients
     */
    public function update(User $user, Patient $patient): bool
    {
        return $patient->facility_id === $user->facility_id 
            && ($user->isAdmin() || $user->isClinician());
    }

    /**
     * Only admins can delete patients
     */
    public function delete(User $user, Patient $patient): bool
    {
        return $patient->facility_id === $user->facility_id && $user->isAdmin();
    }
}
