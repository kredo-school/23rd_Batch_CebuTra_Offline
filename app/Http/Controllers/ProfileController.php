<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Require auth except for testing mockups easily if needed,
        // but let's keep standard Laravel middleware.
        $this->middleware('auth');
    }

    /**
     * Helper to get active user or mock fallback.
     */
    private function getUser()
    {
        $user = Auth::user();
        if (!$user) {
            // Mock object for demonstration
            $user = (object)[
                'name' => 'Sakura',
                'email' => 'sakura@example.com',
                'gender' => 'Female',
                'age' => 22,
                'nationality' => 'Japan',
                'school' => 'EV Academy',
                'english_level' => 'Intermediate (B1)',
                'current_area' => 'Around IT Park',
                'instagram' => 'sakura_cebu',
                'bio' => 'Studying English in Cebu! Enjoying island trips on weekends 🌴 Looking for friendly companions to go to Oslob and Moalboal!'
            ];
        } else {
            // Add custom attributes if missing on real user to prevent errors
            if (!isset($user->gender)) $user->gender = 'Female';
            if (!isset($user->age)) $user->age = 22;
            if (!isset($user->nationality)) $user->nationality = 'Japan';
            if (!isset($user->school)) $user->school = 'EV Academy';
            if (!isset($user->english_level)) $user->english_level = 'Intermediate (B1)';
            if (!isset($user->current_area)) $user->current_area = 'Around IT Park';
            if (!isset($user->instagram)) $user->instagram = 'sakura_cebu';
            if (!isset($user->bio)) $user->bio = 'Studying English in Cebu! Enjoying island trips on weekends 🌴 Looking for friendly companions to go to Oslob and Moalboal!';
        }
        return $user;
    }

    /**
     * Display the user's profile.
     */
    public function show()
    {
        $user = $this->getUser();
        return view('auth.profile.profile', compact('user'));
    }

    /**
     * Show the form for editing the user's profile.
     */
    public function edit()
    {
        $user = $this->getUser();
        return view('auth.profile.profile-edit', compact('user'));
    }

    /**
     * Update the user's profile.
     */
    public function update(Request $request)
    {
        // Perform simple validation and update if logged in
        $user = Auth::user();
        if ($user) {
            $user->update($request->only('name', 'email'));
            // Save other profile attributes if schema exists
        }
        
        return redirect()->route('profile.show')->with('status', 'Profile updated successfully!');
    }

    /**
     * Display settings page.
     */
    public function settings()
    {
        return view('auth.Setting.setting-all');
    }

    /**
     * Setting subpages
     */
    public function emergency()
    {
        return view('auth.Setting.emergency-contact');
    }

    public function help()
    {
        return view('auth.Setting.help-contact');
    }

    public function instagram()
    {
        return view('auth.Setting.instagram-setting');
    }

    public function language()
    {
        return view('auth.Setting.language');
    }

    public function terms()
    {
        return view('auth.Setting.terms');
    }
}
