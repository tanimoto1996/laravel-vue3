<?php

namespace App\Services;

use App\Repositories\GuestRepositoryInterface;

class GuestService implements GuestServiceInterface
{
    protected $GuestRepository;

    public function __construct(GuestRepositoryInterface $GuestRepository)
    {
        $this->GuestRepository = $GuestRepository;
    }

    public function getGuestUser()
    {
        return $this->GuestRepository->GuestUser();
    }

    public function createGuest($data)
    {
        return $this->GuestRepository->create($data);
    }
}