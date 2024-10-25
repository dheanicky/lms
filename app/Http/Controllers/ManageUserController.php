<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkIfBanned');
        $this->middleware(function ($request, $next) {
            if (auth()->user()->usertype !== 'admin') {
                return redirect('/')->with('error', 'Unauthorized Access');
            }
            return $next($request);
        });
    }

    public function index()
    {
        // Mengambil semua user
        $users = User::all();
        return view('manage-user', compact('users'));
    }

    public function banUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        // Hanya izinkan pembanningan untuk pengguna dengan role 'user'
        if ($user->usertype != 'user') {

            return redirect()->back()->with('error', "Cannot ban an {$user->usertype}");
        }
        $user->is_ban = true;
        $user->ban_reason = $request->input('ban_reason');
        $user->save();

        return redirect()->back()->with('status', 'User has been banned');
    }


    public function unbanUser($id)
    {
        $user = User::findOrFail($id);
        $user->is_ban = false;
        $user->ban_reason = null;
        $user->save();

        return redirect()->back()->with('status', 'User has been unbanned');
    }
}
