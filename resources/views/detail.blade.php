@extends('layout')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Baca Artikel</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-11">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Artikel</h6>
                </div>
                <div class="card-body">
                    <table style="border: none;">
                        <tr>
                            <td width="100px">email</td>
                            <td width="30px">:</td>
                            <td>{{ $data->judul_artikel }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td>{{ $data->tanggal }}</td>
                        </tr>
                        <tr>
                            <td>Isi</td>
                            <td>:</td>
                            <td>{{ $data->isi_artikel }}</td>
                        </tr>
                    </table>
                    <hr>
                    <h4>Komentar</h4>
                    <form action="{{ route('store_komentar') }}" method="post">
                        @csrf
                        <input type="hidden" name="id_artikel" value="{{$data->id}}">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror"
                                id="nama" name="nama"
                                placeholder="Masukkan nama..." required>
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                id="email" name="email"
                                placeholder="Masukkan email..." required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="komentar" id="komentar" cols="30" rows="5" class="form-control @error('komentar') is-invalid @enderror" placeholder="Masukkan komentar disini..."></textarea>
                            @error('komentar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection