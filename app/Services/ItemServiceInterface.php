<?php

namespace App\Services;

interface ItemServiceInterface
{
    public function getAllItems();

    public function storeItem($data);
}