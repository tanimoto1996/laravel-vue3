<?php

namespace App\Services;

interface GuestServiceInterface
{
    public function getGuestUser();
    public function createGuest($data);
}