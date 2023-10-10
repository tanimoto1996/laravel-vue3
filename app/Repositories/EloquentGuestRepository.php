<?php

// app/Repositories/EloquentItemRepository.php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;

class EloquentGuestRepository implements GuestRepositoryInterface
{
    public function GuestUser()
    {
        return User::where('email', 'test@test.com')->first();
    }

    public function create(array $attributes)
    {
        return User::create($attributes);
    }
}