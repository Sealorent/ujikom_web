@extends('auth._layout')

@section('title', 'Login')

@section('content')
    <div class="container-xxl">
        <h2 class="fw-bold py-3 m-5 text-center">Artikel</h2>
        {{-- <div class="authentication-wrapper authentication-basic container-p-y"> --}}
            <div class="row">
              @forelse ($data as $item)
                   <div class="col-lg-6 mb-3">
                       <div class="card">
                                <div class="card-body">
                                <h5 class="card-title">{{ $item->judul_artikel }}</h5>
                                <p class="card-text">{{ $item->isi_artikel }}</p>
                                <a href="{{ route('read-article', $item->id) }}" class="btn btn-primary stretched-link">Detail Artikel</a>
                                </div>
                        </div>
                    </div>
              @empty
                  <p>Artikel Masih Belum Tersedia</p>
              @endforelse
            </div>
        {{-- </div> --}}
    </div>
@endsection
@push('after-script')
   
@endpush
