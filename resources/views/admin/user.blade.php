@extends('layouts.panel.index')
@section('body')
<div id="alert-message" class="mb-3"></div>
<div class="row">
    <div class="col-md-6">
        <h1 class="h3 mb-2 text-gray-800">User</h1>
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
                <div class="table-responsive">
                    <table class="table" id="product--data">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Level User</th>
                                <th>Status</th>
                                <th>Status Kelengkapan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $value)
                            <tr>
                                <th>{{$key+1}}</th>
                                <th>{{ $value->nama }}</th>
                                <th>{{ $value->level_id == 1 ? "Admin" : "User" }}</th>
                                <th>{{ $value->status == 0 ? "Menunggu konfirmasi" : "Sudah Dikonfirmasi" }}</th>
                                <th>{{ $value->media_digital == "" && $value->nama_perusahaan == "" && $value->url_mitra == "" && $value->nib == "" && $value->no_rekening == "" && $value->ktp == "" && $value->kta == "" && $value->npwp == "" ? "Belum dilengkapi" : "Sudah Dilengkapi" }}</th>
                                <th>
                                    <button 
                                        data-nama="{{ $value->nama }}"
                                        data-username="{{ $value->username }}"
                                        data-email="{{ $value->email }}"
                                        data-telepon="{{ $value->telepon }}"
                                        data-level_id="{{ $value->level_id }}"
                                        data-media_digital="{{ $value->media_digital }}"
                                        data-nama_perusahaan="{{ $value->nama_perusahaan }}"
                                        data-url_mitra="{{ $value->url_mitra }}"
                                        data-nib="{{ $value->nib }}"
                                        data-no_rekening="{{ $value->no_rekening }}"
                                        data-ktp="{{ $value->ktp }}"
                                        data-kta="{{ $value->kta }}"
                                        data-npwp="{{ $value->npwp }}"
                                        data-toggle="modal" 
                                        data-target="#detailModal" 
                                        class="btn btn-info btn-detail"
                                    >Detail</button>
                                    @if($value->media_digital != "" && $value->nama_perusahaan != "" && $value->url_mitra != "" && $value->nib != "" && $value->no_rekening != "" && $value->ktp != "" && $value->kta != "" && $value->npwp != "" && $value->status != 1)
                                    <button 
                                        data-user_id="{{ $value->user_id }}"
                                        data-toggle="modal" 
                                        data-target="#approveModal" 
                                        class="btn btn-primary btn-approve"
                                    >Approve</button>
                                    @endif
                                    <button 
                                        data-user_id="{{ $value->user_id }}" 
                                        data-toggle="modal" data-target="#deleteModal" 
                                        class="mx-1 btn btn-danger btn-delete"
                                    >Delete</button>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="detailForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input disabled name="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input disabled name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input disabled name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Telepon</label>
                                <input disabled name="telepon" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Level</label>
                                <input disabled name="level_id" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Media Digital</label>
                                <input disabled name="media_digital" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Perusahaan</label>
                                <input disabled name="nama_perusahaan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">URL Mitra</label>
                                <input disabled name="url_mitra" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">NIB</label>
                                <input disabled name="nib" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">No Rekening</label>
                                <input disabled name="no_rekening" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">KTP</label><br>
                                <a src="" target="_blank" class="image--preview--ktp">Lihat File</a>
                            </div>
                            <div class="form-group">
                                <label for="">KTA</label><br>
                                <a src="" target="_blank" class="image--preview--kta">Lihat File</a>
                            </div>
                            <div class="form-group">
                                <label for="">NPWP</label><br>
                                <a src="" target="_blank" class="image--preview--npwp">Lihat File</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="approveForm" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning p-3">
                        Apakah anda yakin ingin approve user ini?
                    </div>
                    <input type="hidden" name="status">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <button class="btn btn-danger" type="submit">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="" id="deleteForm">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-danger p-3">
                        Apakah anda yakin ingin menghapus user ini?
                    </div>
                </div>
                <input required type="hidden" name="berita_id">
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <button class="btn btn-danger" type="submit">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('table').DataTable();
    });
    $(".btn-detail").click(function(){
        // $(`.image--preview`).attr('src',$(this).data("sampul"))
        $(`input[name="nama"]`).val($(this).data("nama"))
        $(`input[name="username"]`).val($(this).data("username"))
        $(`input[name="email"]`).val($(this).data("email"))
        $(`input[name="telepon"]`).val($(this).data("telepon"))
        $(`input[name="level_id"]`).val($(this).data("level_id"))
        $(`input[name="media_digital"]`).val($(this).data("media_digital"))
        $(`input[name="nama_perusahaan"]`).val($(this).data("nama_perusahaan"))
        $(`input[name="url_mitra"]`).val($(this).data("url_mitra"))
        $(`input[name="nib"]`).val($(this).data("nib"))
        $(`input[name="no_rekening"]`).val($(this).data("no_rekening"))
        $(`.image--preview--ktp`).attr('href',$(this).data("ktp"))
        $(`.image--preview--kta`).attr('href',$(this).data("kta"))
        $(`.image--preview--npwp`).attr('href',$(this).data("npwp"))
    })

    $(".btn-approve").click(function(){
        $("#approveForm").attr("action","<?= url("user/update") ?>/"+$(this).data("user_id"))
        $(`[name="status"]`).val('1')
    })

    $(".btn-delete").click(function(){
        $(`input[name="user_id"]`).val($(this).data("user_id"))

        if($(this).hasClass("btn-edit")){
            $("#editForm").attr('action','<?= url("user/update") ?>/'+$(this).data('user_id'))
        }

        if($(this).hasClass("btn-delete")){
            $("#deleteForm").attr('action','<?= url("user/delete") ?>/'+$(this).data('user_id'))
        }
    })
</script>
@endsection

@section('css')
@endsection