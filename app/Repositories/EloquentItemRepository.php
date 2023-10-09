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

    public function find(int $id)
    {
        return Item::find($id);
    }

    public function create(array $attributes)
    {
        return Item::create($attributes);
    }

    public function update(int $id, array $attributes)
    {
        $item = $this->find($id);
        $item->update($attributes);
        return $item;
    }

    public function delete(int $id)
    {
        $item = $this->find($id);
        return $item->delete();
    }
}