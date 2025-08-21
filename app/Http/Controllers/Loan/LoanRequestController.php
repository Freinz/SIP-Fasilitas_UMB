<?php

namespace App\Http\Controllers\Loan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoanRequestController extends Controller
{
    // Riwayat peminjaman ruangan untuk user
    public function historyRoom(Request $request)
    {
        $user = $request->user();
        $loanRequests = \App\Models\loan_request::where('user_id', $user->id)
            ->where('loan_type', 'room')
            ->orderByDesc('created_at')
            ->get();
        return view('loan.loanrequestroom.history', compact('loanRequests'));
    }

    // Detail riwayat peminjaman ruangan
    public function historyRoomShow($id)
    {
        $loanRequest = \App\Models\loan_request::findOrFail($id);
        // Pastikan hanya user yang berhak bisa akses
        if ($loanRequest->user_id !== auth()->id()) {
            abort(403);
        }
        $approvals = \App\Models\Approval::where('loan_request_id', $id)->get();
        return view('loan.loanrequestroom.history-detail', compact('loanRequest', 'approvals'));
    }
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
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'loan_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:loan_date',
            'purpose' => 'required|string',
            'document' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx',
        ]);

        $user = $request->user();

        // Generate nomor pengajuan unik
        $requestNumber = 'REQ-ROOM-' . date('YmdHis') . '-' . strtoupper(uniqid());

        // Handle upload dokumen jika ada
        $documentPath = null;
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('documents', 'public');
        }

        // Simpan loan_request
        $loanRequest = \App\Models\loan_request::create([
            'request_number' => $requestNumber,
            'user_id' => $user->id,
            'loan_type' => 'room',
            'start_date' => $request->loan_date,
            'end_date' => $request->return_date,
            'purpose' => $request->purpose,
            'status' => 'SUBMITTED', // Belum aktif, menunggu approval
            'recommendation_letter_path' => $documentPath,
        ]);

        // Simpan ke tabel pivot loan_rooms jika ada (optional, jika pakai relasi)
        // \App\Models\loan_rooms::create([
        //     'loan_request_id' => $loanRequest->id,
        //     'room_id' => $request->room_id,
        // ]);

        return redirect()->route('dashboard')->with('success', 'Pengajuan peminjaman ruangan berhasil diajukan.');
    }
}
