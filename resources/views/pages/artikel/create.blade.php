@extends('layouts.main')

@section('title', 'Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Artikel /</span> Tambah Artikel</h4>
    <form action="{{ route('artikel.store') }}" method="POST">
        @csrf
        <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <x-input-container name="judul" placeholder="Masukkan Judul" id="judul"  required/>
                        <div class="mb-3">
                            <textarea name="konten" class="form-control" id="konten" cols="20"  rows="5" placeholder="Isikan Konten"></textarea>
                        </div>
                    </div>
                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                <button type="reset" class="btn btn-md btn-warning" onclick="goBack()">KEMBALI</button>
                </div>
            </div>
        </div>
        </div>
    </form>
    <!--/ Responsive Table -->
  </div>
</div>
  <!-- / Content -->
@endsection

@push('after-script')
<script src="{{ asset('/template/assets/js/dashboards-analytics.js') }}"></script>
<script>
    function goBack() {
        window.history.back();
        }
</script>
@endpush