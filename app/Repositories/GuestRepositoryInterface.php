<?php
 
namespace App\Repositories;

use Illuminate\Support\Collection;

interface GuestRepositoryInterface
{
    public function GuestUser();
    public function create(array $attributes);
}