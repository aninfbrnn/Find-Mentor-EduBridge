<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class ThreadController extends Controller
// {
//     public function create()
//     {
//         return view('forum.forum-create');
//     }

//     public function store(Request $request)
//     {
//         // Validasi data
//         $validated = $request->validate([
//             'komentar' => 'required|string|max:255',
//             'type' => 'required|string',
//             'nama_forum' => 'required|string',
//             'nama_pengguna' => 'required|string',
            
//         ]);

//         // Proses penyimpanan data (disesuaikan dengan database Anda)
//         // Misalnya: Thread::create($validated);

//         // Redirect setelah berhasil
//         return redirect()->route('thread.create')->with('success', 'Thread berhasil dibuat!');
//     }
// }
