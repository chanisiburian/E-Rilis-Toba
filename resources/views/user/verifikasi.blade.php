@extends('layouts.panel.index')
@section('body')
<div id="alert-message" class="mb-3"></div>
<div class="row">
    <div class="col-md-6">
        <h1 class="h3 mb-2 text-gray-800">Lengkapi Data Anda</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('user/update').'/'.$data->user_id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Media Digital</label>
                                <input required type="text" value="<?= $data->media_digital ?>" name="media_digital" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Perusahaan</label>
                                <input required type="text" value="<?= $data->nama_perusahaan ?>" name="nama_perusahaan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">URL Mitra</label>
                                <input required type="text" value="<?= $data->url_mitra ?>" name="url_mitra" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">NIB</label>
                                <input required type="text" value="<?= $data->nib ?>" name="nib" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">No_rekening</label>
                                <input required type="number" value="<?= $data->no_rekening ?>" name="no_rekening" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">KTP</label>
                                <input required type="file" value="<?= $data->ktp ?>" name="ktp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">KTA</label>
                                <input required type="file" name="kta" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">NPWP</label>
                                <input required type="file" name="npwp" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Verifikasi</button>
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