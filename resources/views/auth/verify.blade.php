@extends('layouts.auth.app')
@section('title','Verify Email')
@section('main_content')
    <h1 class="fw-bolder text-gray-900 mb-5">{{ __('Verify Your Email Address') }}</h1>
    <!--end::Title-->
    <!--begin::Action-->
    <div class="fs-6 mb-8">
        <span class="fw-semibold text-gray-500">
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
        </span>
    </div>
    <!--end::Action-->
    <!--begin::Link-->
    <div class="mb-11">
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-sm btn-primary">{{ __('click here to request another') }}</button>.
        </form>
    </div>
    <!--end::Link-->
    <!--begin::Illustration-->
    <div class="mb-0">
        <img src="{{ asset('assets/media/auth/please-verify-your-email.png') }}" style="width: 45%;" class="mw-100 mh-300px theme-light-show" alt="" />
        <img src="{{ asset('assets/media/auth/please-verify-your-email-dark.png') }}" style="width: 45%;" class="mw-100 mh-300px theme-dark-show" alt="" />
    </div>
    <!--end::Illustration-->
@endsection
