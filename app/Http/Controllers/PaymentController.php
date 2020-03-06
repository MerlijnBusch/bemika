<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified', 'isUserActive']);
    }

    public function hidePaymentFooter(Request $request){

        $user = User::find(Auth::id());
        $user->disable_payment_info = true;
        $user->update();

        return redirect()->back();

    }
}
