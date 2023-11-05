<?php

namespace App\Services;

use App\Repositories\ItemRepositoryInterface;

class ItemService implements ItemServiceInterface
{
    protected $itemRepository;

    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function getAllItems()
    {
        return $this->itemRepository->all();
    }

    public function storeItem($data)
    {
        return $this->itemRepository->create($data);
    }

    public function getFindItems($id)
    {
        return $this->itemRepository->find($id);
    }
}