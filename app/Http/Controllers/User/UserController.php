<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        // Zorg ervoor dat alle gebruikers ingelogd zijn voor toegang tot profiel
        $this->middleware('auth');
    }

    // Toon het profiel van de ingelogde gebruiker
    public function showProfile()
    {
        return view('user.profile');
    }

    // Werk de gegevens van de ingelogde gebruiker bij
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // Alleen het wachtwoord bijwerken als er een nieuw wachtwoord is ingevoerd
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.profile')->with('success', 'Profiel succesvol bijgewerkt');
    }
}
