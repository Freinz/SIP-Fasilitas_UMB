<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // List semua ruangan
    public function index()
    {
        $rooms = \App\Models\room::all();
        return view('admin.rooms.index', compact('rooms'));
    }

    // Form tambah ruangan
    public function create()
    {
        $categories = \App\Models\room_category::where('is_active', true)->get();
        return view('admin.rooms.create', compact('categories'));
    }

    // Simpan ruangan baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:rooms,code',
            'capacity' => 'required|integer',
            'category_id' => 'required|exists:room_categories,id',
        ]);
        \App\Models\room::create($request->all());
        return redirect()->route('rooms.index')->with('success', 'Ruangan berhasil ditambahkan.');
    }

    // List kategori ruangan (dummy, bisa dikembangkan)
    public function categories()
    {
        // $categories = ...
        return view('admin.rooms.categories');
    }
}
