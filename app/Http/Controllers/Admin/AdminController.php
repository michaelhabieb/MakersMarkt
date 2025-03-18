<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\Moderation;
use App\Models\Credit;

class AdminController extends Controller
{
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

}
