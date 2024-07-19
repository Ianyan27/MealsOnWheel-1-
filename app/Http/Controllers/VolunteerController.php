<?php

namespace App\Http\Controllers;

use App\Models\Volunteers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VolunteerController extends Controller
{
    public function index()
    {


        return view('Users.Volunteer.volunteerIndex');
    }

    public function showDonateForm()
    {
        $userId = Auth::id();
        $hasDonated = Volunteers::where('user_id', $userId)
            ->whereNotNull('donation_amount')
            ->exists();
        return view('Users.Volunteer.volunteerDonate', compact('hasDonated'));
    }

    public function donate(Request $request)
    {
        $request->validate([
            'donation_amount' => 'required|numeric|min:1',
            'message' => 'nullable|string|max:255',
        ]);

        $userId = Auth::id();

        // Check if the user has already donated
        if (Volunteers::where('user_id', $userId)
            ->whereNotNull('donation_amount')
            ->exists()
        ) {
            return redirect()->route('volunteer#index')->with('error', 'You have already made a donation.');
        }

        Volunteers::create([
            'user_id' => $userId,
            'volunteer_name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'payment' => 'Credit Card',
            'donation_amount' => $request->donation_amount,
            'message' => $request->message,
            'donation_date' => now(),
        ]);

        return redirect()->route('volunteer#index')->with('success', 'Thank you for your donation!');
    }
}
