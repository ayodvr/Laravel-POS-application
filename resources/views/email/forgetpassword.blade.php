@extends('layouts.navless')
@section('content')
<div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand login-brand-color">
            </div>
            <div class="card">
              <div class="card-header card-header-auth">
                <h4>{{ __('Reset Password') }}</h4>
              </div>
              <div class="card-body">
                 @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <p class="text-muted">You can reset password from bellow link:</p>
                  <div class="form-group">
                   <a href="{{ route('reset.password.get', $token) }}">
                    <button class="btn btn-lg btn-block btn-auth-color" tabindex="4">
                    {{ __('Reset Password') }}
                  </button></a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection
