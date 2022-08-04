@extends('layouts.panel.index')
@section('body')
<div id="alert-message" class="mb-3"></div>
<div class="row">
    <div class="col-md-6">
        <h1 class="h3 mb-2 text-gray-800">Profile</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div id="alert-message">
            @if($errors->any())
                <div class="alert alert-warning p-2">{{$errors->first()}}</div>
            @endif
        </div>
        <div class="card">
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{ url('user/update').'/'.$data->user_id }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input required value="{{ $data->nama }}" name="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Foto</label>
                                <input required type="file" name="foto" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input required value="{{ $data->username }}" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input required value="{{ $data->email }}" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Telepon</label>
                                <input required value="{{ $data->telepon }}" name="telepon" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="{{ $data->foto }}" width="300" class="img-thumbnail">
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
@endsection

@section('css')
@endsection