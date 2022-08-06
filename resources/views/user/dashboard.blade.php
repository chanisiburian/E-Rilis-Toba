@extends('layouts.panel.index')
@section('body')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
    @if(Auth::user()->status == 1)
    @elseif(Auth::user()->media_digital == null)
    <div class="alert alert-warning p-3">
        Account Anda belum di verifikasi, silahkan lengkapi data anda agar dapat menggunakan semua fitur di aplikasi ini &nbsp;<a style="text-decoration: underline;" href="<?= route("user.verifikasi") ?>">Klik Disini</a>
    </div>
    @else
    <div class="alert alert-info p-3">
        Account Anda belum di verifikasi, silahkan tunggu Admin mengkonfirmasi data anda
    </div>
    @endif

<div class="row">

    <div class="col-sm-3 mb-4" style="max-height:110px">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                            Berita Rilis Diterima</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="">{{ $countActive }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-box fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-9 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <form action="" class="formFilter">
                    <select class="form-control filter-input mb-3" name="status">
                        <option value="">Filter Status</option>
                        <option <?= isset($_GET['status']) && $_GET['status'] == "1" ? "selected" : "" ?> value="1">Sudah Dikonfirmasi</option>
                        <option <?= isset($_GET['status']) && $_GET['status'] == "0" ? "selected" : "" ?> value="0">Belum Dikonfirmasi</option>
                    </select>
                </form>
                <table class="table" id="product--data" class="datatable">
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
                                    class="mx-1 btn btn-info btn-detail"
                                >Detail</button>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
            <form method="post" enctype="multipart/form-data" action="" id="detailForm">
                @csrf
                <div class="modal-body">
                    <div class="alert--message mb-3"></div>
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
                                <input required name="user" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input required name="judul" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <input required name="isi" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <input required name="kategori" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Dibuat</label>
                                <input required type="date" name="tanggal_dibuat" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">URL Berita</label>
                                <input required name="url_berita" class="form-control" disabled>
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
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('table').DataTable();
    });

    $(document).on('change',".filter-input",function(){
        $(".formFilter").submit()
    })

    $(".btn-detail, .btn-edit, .btn-delete").click(function(){
        $(`.image--preview`).attr('src',$(this).data("sampul"))
        $(`input[name="user"]`).val($(this).data("user"))
        $(`input[name="judul"]`).val($(this).data("judul"))
        $(`input[name="isi"]`).val($(this).data("isi"))
        $(`input[name="kategori"]`).val($(this).data("kategori"))
        $(`input[name="status"]`).val($(this).data("status"))
        $(`input[name="tanggal_dibuat"]`).val($(this).data("tanggal_dibuat"))
        $(`input[name="url_berita"]`).val($(this).data("url_berita"))
        $(`input[name="berita_id"]`).val($(this).data("berita_id"))
    })
</script>
@endsection