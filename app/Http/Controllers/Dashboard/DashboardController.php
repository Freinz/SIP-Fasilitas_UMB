<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Contoh: ambil data ringkasan untuk dashboard
        $totalUsers = \App\Models\User::count();
        $totalRooms = \App\Models\room::count();
        $totalEquipment = \App\Models\equipment::count();
        // Tambahkan data lain sesuai kebutuhan

        return view('dashboard', compact('totalUsers', 'totalRooms', 'totalEquipment'));
    }
}
