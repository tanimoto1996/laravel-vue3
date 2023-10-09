<?php
 
namespace App\Repositories;

use Illuminate\Support\Collection;

interface ItemRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id);
}