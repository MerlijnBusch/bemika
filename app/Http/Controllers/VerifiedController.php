<?php

namespace App\Http\Controllers;

use App\Rules\AppLocaleLanguage;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class VerifiedController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * @return RedirectResponse|Factory|View
     */
    public function index(){

        $user = User::find(Auth::id());

        if($user->active == true){
            return redirect()->route('dashboard');
        }

        return view('partials.verified.index', ['user' => $user]);

    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request){

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'lang' => [new AppLocaleLanguage],
        ]);

        $user = User::find(Auth::id());

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->lang = $validated['lang'];
        $user->active = true;

        $user->update();

        return redirect()->route('dashboard');

    }
}
