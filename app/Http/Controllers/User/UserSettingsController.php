<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserSettingsController extends Controller
{
    public function index(string $slug)
    {
        $user = User::slug($slug)->firstOrFail();

        return view('user.settings', compact('user'));
    }
}
