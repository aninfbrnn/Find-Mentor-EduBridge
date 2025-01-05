<?php

namespace App\Http\Controllers;

use App\Models\Forum; // Gunakan 'Forum' dengan huruf kapital
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ForumController extends Controller
{
    public function index()
    {
        // Ambil semua data forum dengan jumlah komentar menggunakan withCount
        $forums = Forum::all();

        return view('forum.index', compact('forums'));
    }

    public function read($id)
    {
        $forum = Forum::with('comments')->findOrFail($id); // Ambil forum dengan relasi komentar

        return view('forum.forum-read', compact('forum'));
    }

    public function create()
    {
        return view('forum-create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_forum' => 'required|string|max:255',
            'nama_pengguna' => 'required|string',
            'type' => 'required|string',
            'komentar' => 'required|string',
        ]);

        // Simpan data forum
        Forum::create([
            'nama_pengguna' => $validated['nama_pengguna'],
            'nama_forum' => $validated['nama_forum'],
            'type' => $validated['type'],
            'komentar' => $validated['komentar'],
        ]);

        return redirect()->route('forum.index')->with('success', 'Forum berhasil dibuat!');
    }

    public function edit($id)
    {
        $forum = Forum::findOrFail($id);

        return view('forum-update', compact('forum'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_forum' => 'required|string|max:255',
            'nama_pengguna' => 'required|string',
            'type' => 'required|string',
        ]);

        // Ambil forum berdasarkan ID
        $forum = Forum::findOrFail($id);

        // Update data forum
        $forum->update($validated);

        return redirect()->route('forum.index')->with('success', 'Forum berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $forum = Forum::findOrFail($id);

        // Hapus data forum
        $forum->delete();

        return redirect()->route('forum.index')->with('success', 'Forum berhasil dihapus.');
    }

    public function show($id)
    {
        $forum = Forum::with('comments')->findOrFail($id);

        return view('forum-show', compact('forum'));
    }

    public function addComment(Request $request, $id)
{
    $request->validate([
        'comment' => 'required|string',
        'author' => 'required|string',
    ]);

    $forum = Forum::findOrFail($id);

    // Tambahkan komentar baru ke kolom komentar
    $comments = $forum->komentar ?? []; // Jika belum ada komentar, gunakan array kosong
    $comments[] = [
        'author' => $request->author,
        'content' => $request->comment,
        'created_at' => now()->toDateTimeString(),
    ];

    // Update kolom komentar
    $forum->update([
        'komentar' => $comments,
    ]);

    return redirect()->route('forum.show', $id)->with('success', 'Komentar berhasil ditambahkan.');
}


}
