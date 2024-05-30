<?php

namespace App\Http\Controllers;

use App\Models\RecordingPodcast;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $userInit;

    public function __construct(User $user)
    {
        $this->userInit = $user;
    }

    public function index()
    {
        $user = $this->userInit->where('id', auth()->user()->id)->first();
        return view('dashboard.dashboard', compact('user'));
    }

    public function getAllPodcasts()
    {
        $podcasts = RecordingPodcast::with('user')->get();
        return view('podcasts.index', compact('podcasts'));
    }

    public function getSpesifikPodcast($slug)
    {
        $podcast = RecordingPodcast::where('slug', $slug)->first();
        return view('podcasts.detail_podcast', compact('podcast'));
    }

    public function deleteUser()
    {
        $user = $this->userInit->where('id', auth()->user()->id)->first();
        $user->delete();
        return back()->with('message', 'User deleted successfully');
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'level' => 'required',
        ]);
        $user = $this->userInit->where('id', $id)->first();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'level' => $request->level,
        ]);

        return back()->with('message', 'User updated successfully');
    }
}
