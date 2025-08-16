<?php

namespace App\Http\Controllers\Loan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoanRequestController extends Controller
{
    // Form pengajuan peminjaman alat
    public function createEquipment()
    {
        $equipments = \App\Models\equipment::where('is_active', 1)->get();
        return view('loan.equipment.create', compact('equipments'));
    }

    // Simpan pengajuan peminjaman alat
    public function storeEquipment(Request $request)
    {
        // Validasi dan simpan data peminjaman alat
        // ...
        return redirect()->route('dashboard')->with('success', 'Pengajuan peminjaman alat berhasil diajukan.');
    }

    // Form pengajuan peminjaman ruangan
    public function createRoom()
    {
        $rooms = \App\Models\room::where('is_active', 1)->get();
        return view('loan.room.create', compact('rooms'));
    }

    // Simpan pengajuan peminjaman ruangan
    public function storeRoom(Request $request)
    {
        // Validasi dan simpan data peminjaman ruangan
        // ...
        return redirect()->route('dashboard')->with('success', 'Pengajuan peminjaman ruangan berhasil diajukan.');
    }
}
