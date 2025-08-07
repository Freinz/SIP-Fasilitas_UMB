<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Show all users for superadmin
    public function show()
    {
        $users = User::all();
        return view('superadmin.show_user', compact('users'));
    }
}
