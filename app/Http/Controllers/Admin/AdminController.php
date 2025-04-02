<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\admin;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Order;
use App\Models\Review;
use App\Models\Moderation;
use App\Models\Credit;

class AdminController extends Controller
{
    public function __construct()
    {
        // Zorg ervoor dat de admin gebruiker toegang heeft
        $this->middleware('role:admin'); // Alleen admin kan toegang krijgen
    }

    // Toon een lijst van alle gebruikers
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
  
   public function dashboard()
    {
        return view('admin.dashboard', [
            'userCount' => User::count(),
            'orderCount' => Order::count(),
            'reviewCount' => Review::count(),
            'moderationCount' => Moderation::count(),
        ]);
    }


    public function credits()
    {
        $users = User::all();
        return view('admin.credits', compact('users'));
    }

    public function updateCredits(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric',
        ]);

        $credit = Credit::firstOrCreate(['user_id' => $request->user_id]);
        $credit->amount += $request->amount;
        $credit->amount = max(0, $credit->amount);
        $credit->save();

        return redirect()->route('admins.credits')->with('success', 'Krediet succesvol bijgewerkt!');
    }

    // Toon het bewerkingsformulier voor een gebruiker
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Werk een gebruiker bij
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // Alleen het wachtwoord bijwerken als er een nieuw wachtwoord is ingevoerd
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker succesvol bijgewerkt');
    }

    // Verwijder een gebruiker
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker succesvol verwijderd');
    }

