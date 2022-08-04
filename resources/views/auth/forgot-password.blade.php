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
                                <h1 class="h6 text-gray-900 mb-4">Masukkan email anda untuk reset password </h1>
                            </div>
                            <div id="alert-message">
                                @if($errors->any())
                                    <div class="alert alert-warning p-2">{{$errors->first()}}</div>
                                @endif
                            </div>
                            <form class="user" action="{{ route('forgot-password') }}" method="post" id="login--form">
                                @csrf
                                <div class="form-group">
                                    <input required type="email" name="email" class="form-control form-control-user" aria-describedby="emailHelp"
                                        placeholder="Masukkan email" id="login--email">
                                    <small class="text-danger error--email"></small>
                                </div>
                                <button type="submit" class="btn btn-user btn-block text-white" style="background:#07057a">
                                    Kirim
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="" style="color:#07057a" href="{{ route('auth.login') }}">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection