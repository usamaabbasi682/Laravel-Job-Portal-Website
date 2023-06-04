@extends('layouts.auth.app')
@section('title','Reset Password')
@section('main_content') 
<!--begin::Card-->
<div class="card rounded-3 w-md-550px">
    <!--begin::Card body-->
    <div class="card-body p-10 p-lg-20">
        <!--begin::Form-->
        <form class="form w-100" method="POST" action="{{ route('password.update') }}" >
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <!--begin::Heading-->
            <div class="text-center mb-10">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder mb-3">Setup New Password</h1>
                <!--end::Title-->
                <!--begin::Link-->
                <div class="text-gray-500 fw-semibold fs-6">Have you already reset the password ?
                <a href="{{ route('login') }}" class="link-primary fw-bold">Sign in</a></div>
                <!--end::Link-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group-->
            <div class="fv-row mb-8" data-kt-password-meter="true">
                <!--begin::Wrapper-->
                <div class="mb-1">
                    <!--begin::Input wrapper-->
                    <div class="position-relative mb-3">
                        <input class="form-control bg-transparent @error('email') is-invalid @enderror" type="text" placeholder="Email" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input wrapper-->
                </div>
                <!--end::Wrapper-->
            </div>

            <!--end::Input group=-->            
            <!--begin::Input group-->
            <div class="fv-row mb-8" data-kt-password-meter="true">
                <!--begin::Wrapper-->
                <div class="mb-1">
                    <!--begin::Input wrapper-->
                    <div class="position-relative mb-3">
                        <input id="password" class="form-control bg-transparent @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" autocomplete="new-password" />
                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                            <i class="bi bi-eye-slash fs-2"></i>
                            <i class="bi bi-eye fs-2 d-none"></i>
                        </span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input wrapper-->
                </div>
                <!--end::Wrapper-->

            </div>
            <!--end::Input group=-->
            <!--end::Input group=-->
            <div class="fv-row mb-8">
                <!--begin::Repeat Password-->
                <input id="password-confirm" type="password" placeholder="Repeat Password" name="password_confirmation" autocomplete="new-password" class="form-control bg-transparent" />
                <!--end::Repeat Password-->
            </div>
            <!--end::Input group=-->
            <!--begin::Action-->
            <div class="d-grid mb-10">
                <button type="submit" class="btn btn-primary">
                    <!--begin::Indicator label-->
                    <span class="indicator-label">Submit</span>
                    <!--end::Indicator label-->
                </button>
            </div>
            <!--end::Action-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->
@endsection

