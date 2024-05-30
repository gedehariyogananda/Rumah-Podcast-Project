<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

  public function index()
  {
    return view('authenticate.view_login');
  }

  public function login(Request $request)
  {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
      Auth::user();
      return redirect()->route('home')->with('success', 'Login Success');
    }

    return back()->with('error', 'Login Failed');
  }
  public function getRegister()
  {
    return view('authenticate.register_page');
  }

  public function register(Request $request)
  {

    $validates = $request->validate([
      'name' => 'required',
      'email' => 'required',
      'password' => 'required',
      'username' => 'required',
      'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
      'level' => 'required',
    ]);

    $validates['password'] = bcrypt($request->password);
    $validates['foto'] = $request->file('foto')->store('uploads', 'public');

    $postData = User::create($validates);
    if ($postData) {
      return redirect('/')->with('success', 'Data berhasil dibuat!,silahkan Login');
    }
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerate();
    return redirect('/');
  }

  public function profile()
  {
    $user = User::where('id', auth()->user()->id)->first();
    return view('authenticate.profile', compact('user'));
  }

  public function editProfile(Request $request)
  {
    $validates = $request->validate([
      'name' => 'required',
      'username' => 'required',
      'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048',
    ]);


    $user = User::where('id', auth()->user()->id)->first();

    if ($request->foto == null) {
      $user->update([
        'name' => $request->name,
        'username' => $request->username,
        'foto' => $user->foto
      ]);
    } else {
      $validates['foto'] = $request->file('foto')->store('uploads', 'public');
      $user->update($validates);
    }


    return redirect()->route('home')->with('success', 'User updated successfully');
  }
}
