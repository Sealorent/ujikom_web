@extends('layouts.main')

@section('title', 'Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro')

@section('content')

@push('after-style')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

<div class="container-xxl flex-grow-1 container-p-y">
    <h2>Penulis</h2>
    <div class="row">
        @include('includes.alert')
        <div class="card">
            <div class="card-header">
                <h1 class="h3 mb-0 text-gray-800">Data Penulis</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td class="form-inline">
                                            <form action="{{ route('penulis.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="active" value="{{$item->active == 1 ? 0 : 1}}">
                                                <button type="submit" class="btn @if ($item->active == 1) btn-danger @else btn-success @endif btn-sm" onclick="return confirm('Anda yakin akan melakukan perubahan terhadap data ini?')">
                                                    @if ($item->active == 1) Non aktifkan @else Aktifkan @endif
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            Maaf, data belum tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
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