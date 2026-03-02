<?php

namespace App\Policies;

use App\Models\Department;
use App\Models\User;

class DepartmentPolicy
{
    /**
     * Admins can perform any action on departments
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->isAdmin()) {
            return true;
        }
        return null;
    }

    /**
     * Only admins can view departments (enforced in before)
     */
    public function view(User $user, Department $department): bool
    {
        return $department->facility_id === $user->facility_id;
    }

    /**
     * Only admins can create (enforced in before)
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Only admins can update (enforced in before)
     */
    public function update(User $user, Department $department): bool
    {
        return $department->facility_id === $user->facility_id;
    }

    /**
     * Only admins can delete (enforced in before)
     */
    public function delete(User $user, Department $department): bool
    {
        return $department->facility_id === $user->facility_id;
    }
}
