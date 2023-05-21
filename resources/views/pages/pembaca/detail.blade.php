@extends('auth._layout')

@section('title', 'Login')

@section('content')
    <div class="container-xxl">
        <h4 class="fw-bold py-3 m-5 text-center"><span class="text-muted fw-light">Artikel /</span> Detail Artikel</h4>
        {{-- <div class="authentication-wrapper authentication-basic container-p-y"> --}}
            <div class="row">
                <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Artikel</h6>
                </div>
                <div class="card-body">
                    <table style="border: none;">
                        <tr>
                            <td width="100px">Judul Artikel</td>
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
                    <h4>Tambah Komentar</h4>
                    <form action="{{ route('store_komentar') }}" method="post">
                        @csrf
                        <input type="hidden" name="id_artikel" value="{{$data->id}}">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror"
                                id="nama" name="nama"
                                placeholder="Masukkan nama..." required>
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                id="email" name="email"
                                placeholder="Masukkan email..." required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
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
            <div class="row">
                <h4>List Komentar</h4>
                @foreach ($listKomentar as $item)
                    <h6><strong> Nama:</strong> {{ $item->nama }}</h6>
                    <p>Email: {{ $item->email }}</p>
                    <p>Komentar: {{ $item->isi_komentar }}</p>
                @endforeach
            </div>
        {{-- </div> --}}
    </div>
@endsection
@push('after-script')
   
@endpush
