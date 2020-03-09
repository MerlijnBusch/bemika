<?php

namespace App\Http\Controllers;

use App\Rules\AppLocaleLanguage;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified', 'isUserActive']);
    }

    /**
     * @return Factory|View
     */
    public function index(){

        $user = User::find(Auth::id());
        $payment = DB::table('payment_options')->where('id', $user->payment_id)->first();
        $formattedDate = Carbon::now()->format('d M Y');

        return view('partials.User.profile', ['user' => $user, 'payment' => $payment, 'current_date' => $formattedDate]);

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
