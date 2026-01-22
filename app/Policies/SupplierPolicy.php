<?php

namespace App\Policies;

use App\Models\User;

class SupplierPolicy
{
    /**
     * Create a new policy instance.
     */
    public function create(User $user): bool
    {
        return $user->role === "admin" || $user->role === "manager";
    }

}
