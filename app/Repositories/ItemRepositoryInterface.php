<?php
 
namespace App\Repositories;

use Illuminate\Support\Collection;

interface ItemRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id);
    public function create(array $attributes);
    public function update(int $id, array $attributes);
    public function delete(int $id);
}