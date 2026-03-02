<?php

namespace App\Policies;

use App\Models\HandoverAlert;
use App\Models\User;

class HandoverAlertPolicy
{
    /**
     * View alert: all authenticated users in same facility
     */
    public function view(User $user, HandoverAlert $alert): bool
    {
        return $alert->facility_id === $user->facility_id;
    }

    /**
     * Create alert: only admins
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Delete alert: only admins
     */
    public function delete(User $user, HandoverAlert $alert): bool
    {
        return $alert->facility_id === $user->facility_id && $user->isAdmin();
    }
}
