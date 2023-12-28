<?php

namespace App\Policies;

use App\Models\Resource;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResourcePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['editor', 'admin']);
    }

    public function update(User $user, Resource $resource): bool
    {
        return $this->grantPermission($user, $resource);
    }

    public function delete(User $user, Resource $resource): bool
    {
        return $this->grantPermission($user, $resource);
    }

    private function grantPermission(User $user, Resource $resource): bool
    {
        return $user->isAdmin() || $user->id === $resource->created_by && $user->hasRole('editor');
    }
}
