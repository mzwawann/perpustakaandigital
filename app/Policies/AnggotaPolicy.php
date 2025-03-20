<?php

namespace App\Policies;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AnggotaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role == 'petugas';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Anggota $anggota): bool
    {
        return $user->role == 'petugas';
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role == 'petugas';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Anggota $anggota): bool
    {
        return $user->role == 'petugas';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Anggota $anggota): bool
    {
        return $user->role == 'petugas';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Anggota $anggota): bool
    {
        return $user->role == 'petugas';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Anggota $anggota): bool
    {
        return $user->role == 'petugas';
    }
}
