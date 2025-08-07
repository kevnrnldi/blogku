@extends('layout')

@section('content')
    <h1 class="text-center mt-5">Selamat Datang di Halaman Utama</h1>
    <p class="text-center">Ini adalah halaman utama dari aplikasi Laravel Anda.</p>
    <div class="container m-5">
         <div class="row gap-3 ">
            @foreach ($artikel as $item)
                <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/' . $item->thumbnail) }}" class="card-img-top" alt="{{ $item->title }}" width="200px" height="200px" loading="lazy"> 
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                <p class="card-text">{{Str::limit( $item->content, 50)}}</p>
                <div>
                    <a href="{{ route( 'artikel.show',  $item->id) }}" class="btn btn-primary btn-sm">Lihat</a>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $item->id }}">Hapus</button>
                </div>
                   </div>
                </div>

                 <!-- Modul Konfirmasi Hapus -->
                <div class="modal fade" id="hapusModal{{ $item->id }}" tabindex="-1" aria-labelledby="hapusModalLabel{{ $item->id }}" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="hapusModalLabel{{ $item->id }}">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Apakah kamu yakin ingin menghapus artikel <strong>{{ $item->title }}</strong>?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('artikel.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

            @endforeach  
         </div>
        
         <div class="d-flex justify-content-center ">
            <button class="btn mt-3 btn-primary  btn-lg px-5"><a href="{{ route('artikel.create') }}" class="text-decoration-none text-white fw-bold">Tambah Artikel</a> </button>
         </div>
            
    </div>
@endsection 