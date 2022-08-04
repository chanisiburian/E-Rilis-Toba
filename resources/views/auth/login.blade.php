@extends('layouts.auth.index')
@section('body')
<div class="row justify-content-center auth--content">

    <div class="col-xl-6 col-lg-6 col-md-12">
        <h4 class="text-center font-weight-bold bg-light shadow rounded py-3"><a href="{{ url('') }}" class="text-decoration-none " style="color:#07057a">E-Rilis Toba</a></h4>
        <div class="card o-hidden border-0 shadow-lg my-5 auth--box">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Silahkan Masuk </h1>
                            </div>
                            <div id="alert-message">
                                @if($errors->any())
                                    <div class="alert alert-warning p-2">{{$errors->first()}}</div>
                                @endif
                            </div>
                            <form class="user" action="{{ route('login') }}" method="post" id="login--form">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" aria-describedby="emailHelp"
                                        placeholder="Masukkan email" id="login--email">
                                    <small class="text-danger error--email"></small>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user" placeholder="Masukkan password" id="login--password">
                                    <small class="text-danger error--password"></small>
                                </div>
                                <button type="submit" class="btn btn-user btn-block text-white" style="background:#07057a">
                                    Login
                                </button>
                            </form>
                            <hr>
                            <div class="d-flex justify-content-between">
                    <a class="underline " style="color:#07057a" href="{{ route('auth.forgot-password') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    <span class="">
                                Belum punya akun? <a class="" style="color:#07057a" href="{{ route('auth.register') }}">Register</a>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection