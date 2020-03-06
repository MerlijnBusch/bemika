@extends('layouts.main')

@section('title', Auth::user()->name . ' profile')

@section('content')

    <h1>user profile</h1>

    <form method="post" action="{{ route('user.setLanguage') }}">
        @method('POST')
        @csrf
        <label>{{trans('labels.set_language')}}</label>
        {{ Form::select('lang', Config::get('languages'), old('lang', $user->lang ?? ''), ['class' => '']) }}
        {{ Form::submit('Save', ['name' => 'submit'], ['class' => '']) }}
    </form>

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



