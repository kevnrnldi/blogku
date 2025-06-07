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
                <a href="{{ route( 'artikel.show',  $item->id) }}" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            @endforeach  
         </div>
        
         <div class="d-flex justify-content-center ">
            <button class="btn mt-3 btn-primary  btn-lg px-5"><a href="{{ route('artikel.create') }}" class="text-decoration-none text-white fw-bold">Tambah Artikel</a> </button>
         </div>
            
    </div>
@endsection 