@extends('layouts.main')

@section('title', Auth::user()->name . ' profile')

@section('content')

    <h1>user profile</h1>

    <div class="user-profile-payment">
        @foreach($payments as $payment)
            <div class="user-profile-payment-inner">
                {{$payment->title}}
                {{$payment->description}}
                {{$payment->price}}
                @if($payment->id == $user->payment_id)
                    selected
                @endif
            </div>
        @endforeach
    </div>

@stop



