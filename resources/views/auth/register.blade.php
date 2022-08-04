@extends('layouts.auth.index')
@section('body')
<div class="row justify-content-center auth--content">

    <div class="col-xl-6 col-lg-6 col-md-12">
        <div class="card o-hidden border-0 shadow-lg my-5 auth--box">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrasi </h1>
                            </div>
                            <div id="alert-message">
                                @if($errors->any())
                                    <div class="alert alert-warning p-2">{{$errors->first()}}</div>
                                @endif
                            </div>
                            <form class="user" action="{{ route('user.add') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input required type="text" autocomplete="off" class="form-control form-control-user" name="nama" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <input required type="text" autocomplete="off" class="form-control form-control-user" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input required type="email" autocomplete="off" class="form-control form-control-user" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input required type="text" autocomplete="off" class="form-control form-control-user" name="telepon" placeholder="Telepon">
                                </div>
                                <div class="form-group">
                                    <input required type="password" autocomplete="off" class="form-control form-control-user" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input required type="password" autocomplete="off" class="form-control form-control-user" name="password_confirmation" placeholder="Konfirmasi Password">
                                </div>
                                <button type="submit" class="btn text-white btn-user btn-block" style="background:#07057a">
                                    Register
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                Sudah punya akun? <a class="small" style="color:#07057a" href="{{ route('auth.login') }}">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
@section('js')
@endsection