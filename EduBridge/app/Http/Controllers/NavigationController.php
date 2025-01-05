<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\Cart;

class NavigationController extends Controller
{
    /**
     * Menampilkan halaman Dashboard.
     */
    public function dashboard()
    {
        return view('dashboard');
    }

    /**
     * Menampilkan halaman Find Mentor.
     * Data diambil dari database (table mentors).
     */
    public function findMentor()
    {
        $mentors = Mentor::paginate(10);
        return view('find-mentor', compact('mentors'));
    }

    /**
     * Menampilkan halaman Chat.
     */
    public function chat()
    {
        return view('chat');
    }

    /**
     * Menampilkan halaman Forum.
     */
    public function forum()
    {
        return view('forum');
    }

    /**
     * Menampilkan halaman Find Friend.
     */
    public function findFriend()
    {
        return view('find-friend');
    }
}
