<?php

namespace App\Http\Controllers\Loan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\loan_request;
use App\Models\Approval;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ApprovalController extends Controller
{
    // List loan requests that need approval for current admin role
    public function index(Request $request)
    {
        $user = Auth::user();
        $role = $user->roles->first()->name ?? null;
        // Filter loan requests by status sesuai role
        $statusMap = [
            'admin rumah tangga' => 'SUBMITTED',
            'admin bagian umum' => 'CHECKED',
            'pimpinan' => 'APPROVED',
        ];
        $status = $statusMap[$role] ?? null;
        $loanRequests = loan_request::where('status', $status)->get();
        return view('loan.approval.index', compact('loanRequests'));
    }

    // Show detail & approval history
    public function show($id)
    {
        $loanRequest = loan_request::findOrFail($id);
        $approvals = Approval::where('loan_request_id', $id)->get();
        return view('loan.approval.show', compact('loanRequest', 'approvals'));
    }

    // Approve or reject
    public function action(Request $request, $id)
    {
        $request->validate([
            'action' => 'required|in:approve,reject',
            'notes' => 'nullable|string',
        ]);
        $user = Auth::user();
        $role = $user->roles->first()->name ?? null;
        $roleMap = [
            'admin rumah tangga' => 'admin_rt',
            'admin bagian umum' => 'admin_umum',
            'pimpinan' => 'pimpinan',
        ];
        $loanRequest = loan_request::findOrFail($id);
        // Simpan approval
        Approval::create([
            'loan_request_id' => $id,
            'approver_id' => $user->id,
            'approver_role' => $roleMap[$role] ?? $role,
            'action' => $request->action,
            'notes' => $request->notes,
            'action_at' => Carbon::now(),
        ]);
        // Update status loan_request
        if ($request->action === 'approve') {
            $nextStatus = [
                'admin rumah tangga' => 'CHECKED',
                'admin bagian umum' => 'APPROVED',
                'pimpinan' => 'RECOMMENDATION_ISSUED',
            ];
            $loanRequest->status = $nextStatus[$role] ?? $loanRequest->status;
        } else {
            $loanRequest->status = 'REJECTED';
            $loanRequest->rejection_reason = $request->notes;
        }
        $loanRequest->save();
        return redirect()->route('loan.approval.index')->with('success', 'Approval berhasil diproses.');
    }
}
