<?php

namespace App\Policies;

use App\Enums\Users\UserRole;
use App\Models\Provider;
use App\Models\User;
class ProviderPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Provider $provider): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->role === UserRole::CUSTOMER;
    }

    public function update(User $user, Provider $provider): bool
    {
        return (
            $user->role === UserRole::ADMIN ||
            (
                $user->id === $provider->user_id &&
                $user->role === UserRole::PROVIDER
            )
        );
    }

    public function delete(User $user, Provider $provider): bool
    {
        return $user->id === $provider->user_id
            || $user->role === UserRole::ADMIN;
    }

    public function restore(User $user, Provider $provider): bool
    {
        return $user->id === $provider->user_id
            || $user->role === UserRole::ADMIN;
    }

    public function forceDelete(User $user, Provider $provider): bool
    {
        return $user->role === UserRole::ADMIN;
    }
}
