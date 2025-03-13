<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BackupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the backup page.
     */
    public function view(User $user): bool
    {
        return $user->can('view_backups');
    }

    /**
     * Determine whether the user can create backups.
     */
    public function create(User $user): bool
    {
        return $user->can('create_backups');
    }

    /**
     * Determine whether the user can delete backups.
     */
    public function delete(User $user): bool
    {
        return $user->can('delete_backups');
    }

    /**
     * Determine whether the user can restore backups.
     */
    public function restore(User $user): bool
    {
        return $user->can('restore_backups');
    }

    /**
     * Determine whether the user can download backups.
     */
    public function download(User $user): bool
    {
        return $user->can('download_backups');
    }
}
