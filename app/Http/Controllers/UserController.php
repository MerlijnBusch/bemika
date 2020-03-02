<?php

namespace App\Http\Controllers;

use App\Rules\AppLocaleLanguage;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return Factory|View
     */
    public function index(){

        return view('partials.User.profile', ['user' => Auth::user()]);

    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function setLanguage(Request $request) {

        $validated = $request->validate([
            'lang' => [new AppLocaleLanguage,'required'],
        ]);

        User::setLanguage($validated['lang']);

        return redirect()->route('user.profile');
    }
}
