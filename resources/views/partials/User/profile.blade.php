@extends('layouts.main')

@section('title', Auth::user()->name . ' profile')

@section('content')

    <div class="user-profile-container">
        <div class="user-profile-form">
            {{ Form::model($user, ['route' => ['user.profile.update', $user->id], 'method' => 'patch']) }}
            {{ Form::text('name', old('name', $user->name ?? ''), ['class' => 'form-field', 'placeholder' => trans('labels.form_name')]) }}
            {{ Form::Email('email', old('email', $user->email ?? ''), ['class' => 'form-field', 'placeholder' => trans('labels.form_email')]) }}
            {{ Form::select('lang', Config::get('languages'), old('lang', $user->lang ?? ''), ['class' => 'form-field']) }}
            <div class="user-profile-form-button-container">
                {{ Form::submit('Save', ['name' => 'submit', 'class' => 'button']) }}
            </div>
            {{ Form::close() }}
            <hr>

            {{ Form::model($user, ['route' => ['placeholder.post'], 'method' => 'patch']) }}
            {{ Form::text('card_number', old('card_number'), ['class' => 'form-field', 'placeholder' => trans('labels.form_credit_card')]) }}
            <div class="user-profile-form-payment">
            {{ Form::date('expiration_date', old('expiration_date'), ['class' => 'form-field', 'placeholder' => trans('labels.form_expiration_date'), 'style'=>'width:170%;margin-right:5px']) }}
            {{ Form::text('cvc', old('cvc'), ['class' => 'form-field', 'placeholder' => 'Cvc']) }}
            </div>
            <div class="user-profile-form-payment">
            {{ Form::text('postal_code', old('postal_code'), ['class' => 'form-field', 'placeholder' => trans('labels.form_postal_code'), 'style'=>'width:30%;margin-right:5px']) }}
            {{ Form::select('countries', Config::get('countries'), old('countries'), ['class' => 'form-field']) }}
            </div>
            <div class="user-profile-form-payment-subscribe-text">
                <h3>{{trans('labels.subscription_title')}}</h3>
                <p>
                    {{trans('labels.subscription_info', ['date' => $current_date])}}
                </p>
            </div>
            {{ Form::submit('Subscribe', ['name' => 'submit', 'class' => 'button', 'style'=>'width:100%']) }}
            {{ Form::close() }}
        </div>
        <div class="user-profile-payment-container">
            <div>
            <h3>{{trans('labels.subscription_header')}}</h3>
            </div>
            <hr>
            <div class="user-profile-list-container">
                <div class="user-profile-list-item"><i class="material-icons">done</i>Unlimited patients</div>
                <div class="user-profile-list-item"><i class="material-icons">done</i>Some other benefits</div>
                <div class="user-profile-list-item"><i class="material-icons">done</i>Some other benefits</div>
                <div class="user-profile-list-item"><i class="material-icons">done</i>Some other benefits</div>
                <div class="user-profile-list-item"><i class="material-icons">done</i>Some other benefits</div>
                <div class="user-profile-list-item"><i class="material-icons">done</i>Some other benefits</div>
            </div>
            <hr>
            <div>
                <div class="user-profile-price-container">
                    <div class="user-profile-price-header">{{trans('labels.subscription_year_plan')}}</div>
                    <p>$60</p>
                </div>
                <div class="user-profile-price-container">
                    <div class="user-profile-price-header">{{$current_date}}</div>
                    <p>$60</p>
                </div>
                <p>{{trans('labels.subscription_start')}}</p>
            </div>
            <hr>
            <div>{{trans('labels.subscription_current_plan')}}: <b>{{$payment->title}}</b></div>
        </div>
    </div>

@stop



