@extends('layouts.main')

@section('title', 'Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro')

@section('content')

@push('after-style')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

<div class="container-xxl flex-grow-1 container-p-y">
    <h2>Artikel</h2>
    <div class="row">
        @include('includes.alert')
        <div class="card">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Data Artikel</h1>
                    <a href="{{ route('artikel.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i
                            class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table" id="crudTable">
                        <thead>
                             <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Konten</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                                @forelse ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->judul_artikel }}</td>
                                        <td>{{ $item->isi_artikel }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td >
                                            <div class="d-flex">
                                                <a href="{{ route('artikel.edit', $item->id) }}" class="btn btn-info btn-sm mr-1">
                                                    <i class="bx bx-pen"></i>
                                                </a>
                                                <form action="{{ route('artikel.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ini?')">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            Maaf, data belum tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Konten</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-style')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@push('after-script')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endpush