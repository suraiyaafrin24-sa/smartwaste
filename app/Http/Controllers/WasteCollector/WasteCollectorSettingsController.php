<?php

namespace App\Http\Controllers\WasteCollector;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WasteCollectorSettingsController extends Controller
{
    public function index()
    {
        return view('collector.settings');
    }

    public function updateProfile(Request $request)
    {
        return redirect()->back()->with('success', 'Profile updated.');
    }

    public function deleteAvatar()
    {
        return redirect()->back()->with('success', 'Avatar deleted.');
    }

    public function updatePassword(Request $request)
    {
        return redirect()->back()->with('success', 'Password updated.');
    }
}
