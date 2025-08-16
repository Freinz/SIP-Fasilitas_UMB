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

    // Edit kategori ruangan
    public function editCategory($id)
    {
        $category = \App\Models\room_category::findOrFail($id);
        $categories = \App\Models\room_category::orderBy('name')->get();
        return view('admin.rooms.categories', compact('categories', 'category'));
    }

    // Update kategori ruangan
    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $category = \App\Models\room_category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('rooms.categories')->with('success', 'Kategori berhasil diupdate.');
    }

    // Hapus kategori ruangan
    public function deleteCategory($id)
    {
        $category = \App\Models\room_category::findOrFail($id);
        $category->delete();
        return redirect()->route('rooms.categories')->with('success', 'Kategori berhasil dihapus.');
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

    // List & input kategori ruangan
    public function categories(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);
            \App\Models\room_category::create([
                'name' => $request->name,
                'description' => $request->description,
                'is_active' => true,
            ]);
            return redirect()->route('rooms.categories')->with('success', 'Kategori berhasil ditambahkan.');
        }
        $categories = \App\Models\room_category::orderBy('name')->get();
        return view('admin.rooms.categories', compact('categories'));
    }
}
