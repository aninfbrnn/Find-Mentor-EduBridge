<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    /**
     * Menampilkan daftar mentor.
     */
    public function index()
    {
        // Ambil semua data mentor dari database dengan pagination
        $mentors = Mentor::paginate(100);

        // Pastikan view `find-mentor` ada dan menerima data
        return view('find-mentor', compact('mentors'));
    }

    /**
     * Menampilkan detail mentor berdasarkan ID.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    // public function show($id)
    // {
    //     // Cari mentor berdasarkan ID, atau tampilkan error 404 jika tidak ditemukan
    //     $mentor = Mentor::findOrFail($id);

    //     // Pastikan view `mentors.show` ada dan menerima data
    //     return view('mentors.show', compact('mentor'));
    // }
    public function show($id)
    {
        $mentor = Mentor::findOrFail($id);
        return response()->json($mentor);
    }

    /**
     * Fungsi untuk menyimpan data mentor baru.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validasi data dari request
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'skills' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:500',
        ]);

        // Simpan gambar ke folder public/images
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Simpan data mentor ke database
        $mentor = Mentor::create([
            'image' => $imageName,
            'name' => $request->name,
            'skills' => $request->skills,
            'price' => $request->price,
            'description' => $request->description,

        ]);

        // Periksa apakah request datang dari AJAX
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Mentor added successfully!',
                'mentor' => $mentor,
            ]);
        }

        // Redirect jika request bukan AJAX
        return redirect()->route('find-mentor')->with('success', 'Mentor added successfully!');
    }

    /**
     * Menghapus mentor berdasarkan ID.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function destroy($id, Request $request)
    {
        $mentor = Mentor::findOrFail($id);
        $mentor->delete();

        // Periksa apakah request datang dari AJAX
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Mentor deleted successfully!',
            ]);
        }

        // Redirect jika request bukan AJAX
        return redirect()->back()->with('success', 'Mentor terhapus');
    }

    public function update(Request $request, $id)
    {
        $mentor = Mentor::findOrFail($id);

        $mentor->name = $request->input('name');
        $mentor->skills = $request->input('skills');
        $mentor->price = $request->input('price');
        $mentor->description = $request->input('description');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
    
            // Delete old image
            if ($mentor->image && file_exists(public_path('images/' . $mentor->image))) {
                unlink(public_path('images/' . $mentor->image));
            }
    
            $mentor->image = $filename;
        }

        $mentor->save();

        return redirect()->back()->with('success', 'Detail mentor telah terupdate');
    }

}
