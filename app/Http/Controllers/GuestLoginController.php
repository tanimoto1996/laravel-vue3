<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\GuestService;

class GuestLoginController extends Controller
{
    protected $guestService;

    public function __construct(GuestService $guestService)
    {
        $this->guestService = $guestService;
    }

    public function guestLogin()
    {
        // テスト用ユーザーの情報を取得
        $user = $this->guestService->getGuestUser();

        if (!$user) {
            $this->itemService->createGuest([
                'name'  => 'createGuest',
                'memo'  => 'test@test.com',
                'price' => bcrypt('password123'),
            ]);
        }

        // テスト用ユーザーでログイン
        Auth::login($user);

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
