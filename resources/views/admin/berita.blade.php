@extends('layouts.panel.index')
@section('body')
<div id="alert-message" class="mb-3"></div>
<div class="row">
    <div class="col-md-6">
        <h1 class="h3 mb-2 text-gray-800">Berita</h1>
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
                                <th>Judul Berita</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $value)
                            <tr>
                                <th>{{ $key+1 }}</th>
                                <th>{{ $value->judul }}</th>
                                <th>{{ $value->status == 0 ? "Menunggu konfirmasi" : "Sudah Dikonfirmasi" }}</th>
                                <th>
                                    <button 
                                        data-user="{{ $value->user->nama }}" 
                                        data-berita_id="{{ $value->id }}" 
                                        data-judul="{{ $value->judul }}" 
                                        data-sampul="{{ $value->sampul }}" 
                                        data-isi="{{ $value->isi }}" 
                                        data-kategori="{{ $value->kategori }}" 
                                        data-tanggal_dibuat="{{ $value->tanggal_dibuat }}" 
                                        data-url_berita="{{ $value->url_berita }}" 
                                        data-status='{{ $value->status == 0 ? "Menunggu konfirmasi" : "Sudah Dikonfirmasi" }}' 
                                        data-toggle="modal" data-target="#detailModal" 
                                        class="btn btn-info btn-detail"
                                    >Detail</button>
                                    @if($value->status == 0)
                                    <button 
                                        data-user="{{ $value->user->nama }}" 
                                        data-berita_id="{{ $value->id }}" 
                                        data-judul="{{ $value->judul }}" 
                                        data-sampul="{{ $value->sampul }}" 
                                        data-isi="{{ $value->isi }}" 
                                        data-kategori="{{ $value->kategori }}" 
                                        data-tanggal_dibuat="{{ $value->tanggal_dibuat }}" 
                                        data-url_berita="{{ $value->url_berita }}" 
                                        data-toggle="modal" data-target="#approveModal" 
                                        class="btn btn-primary btn-approve"
                                    >Approve</button>
                                    @endif
                                    <button 
                                        data-user="{{ $value->user->nama }}" 
                                        data-berita_id="{{ $value->id }}" 
                                        data-judul="{{ $value->judul }}" 
                                        data-sampul="{{ $value->sampul }}" 
                                        data-isi="{{ $value->isi }}" 
                                        data-kategori="{{ $value->kategori }}" 
                                        data-tanggal_dibuat="{{ $value->tanggal_dibuat }}" 
                                        data-url_berita="{{ $value->url_berita }}" 
                                        data-status='{{ $value->status == 0 ? "Menunggu konfirmasi" : "Sudah Dikonfirmasi" }}' 
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
                <h5 class="modal-title">Detail Berita</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="alert--message mb-3"></div>
                    <form id="detailForm">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="upload--image mb-2">
                                    <div class="upload--image-preview">
                                        <img alt="" width="100%" class="image--preview">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">User</label>
                                    <input name="user" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Judul</label>
                                    <input name="judul" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <input name="isi" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select name="kategori" class="form-control" disabled>
                                        <option selected disabled>---Pilih Kategori---</option>
                                        <option value="budaya">Budaya</option>
                                        <option value="pariwisata">Pariwisata</option>
                                        <option value="pendidikan">Pendidikan</option>
                                        <option value="kesehatan">Kesehatan</option>
                                        <option value="olahraga">Olahraga</option>
                                        <option value="teknologi">Teknologi</option>
                                        <option value="ekonomi">Ekonomi</option>
                                        <option value="peristiwa">Peristiwa</option>
                                        <option value="internasional">Internasional</option>
                                        <option value="pemerintahan">Pemerintahan</option>
                                        <option value="musik">Musik</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <input name="status" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Dibuat</label>
                                    <input name="tanggal_dibuat" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">URL Berita</label>
                                    <input name="url_berita" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </form>
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
                        Apakah anda yakin ingin approve berita ini?
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
                        Apakah anda yakin ingin menghapus berita ini?
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
        $(`input[name="user"]`).val($(this).data("user"))
        $(`.image--preview`).attr('src',$(this).data("sampul"))
        $(`input[name="judul"]`).val($(this).data("judul"))
        $(`input[name="isi"]`).val($(this).data("isi"))
        $(`input[name="kategori"]`).val($(this).data("kategori"))
        $(`input[name="status"]`).val($(this).data("status"))
        $(`input[name="tanggal_dibuat"]`).val($(this).data("tanggal_dibuat"))
        $(`input[name="url_berita"]`).val($(this).data("url_berita"))
    })

    $(".btn-approve").click(function(){
        $("#approveForm").attr("action","<?= url("berita/update") ?>/"+$(this).data("berita_id"))
        $(`[name="status"]`).val('1')
    })
    
    $(".btn-delete").click(function(){
        $(`.image--preview`).attr('src',$(this).data("sampul"))
        $(`input[name="user"]`).val($(this).data("user"))
        $(`input[name="judul"]`).val($(this).data("judul"))
        $(`input[name="isi"]`).val($(this).data("isi"))
        $(`input[name="kategori"]`).val($(this).data("kategori"))
        $(`input[name="status"]`).val($(this).data("status"))
        $(`input[name="tanggal_dibuat"]`).val($(this).data("tanggal_dibuat"))
        $(`input[name="url_berita"]`).val($(this).data("url_berita"))
        $(`input[name="berita_id"]`).val($(this).data("berita_id"))

        if($(this).hasClass("btn-edit")){
            $("#editForm").attr('action','<?= url("berita/update") ?>/'+$(this).data('berita_id'))
        }

        if($(this).hasClass("btn-delete")){
            $("#deleteForm").attr('action','<?= url("berita/delete") ?>/'+$(this).data('berita_id'))
        }
    })
</script>
@endsection

@section('css')
@endsection