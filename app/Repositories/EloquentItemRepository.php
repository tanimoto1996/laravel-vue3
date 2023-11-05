<?php

// app/Repositories/EloquentItemRepository.php

namespace App\Repositories;

use App\Models\Item;
use Illuminate\Support\Collection;

class EloquentItemRepository implements ItemRepositoryInterface
{
    public function all(): Collection
    {
        return Item::select('id', 'name', 'price', 'is_selling')->get();
    }

    public function create(array $attributes)
    {
        return Item::create($attributes);
    }

    public function find(int $id)
    {
        return Item::find($id);
    }
}