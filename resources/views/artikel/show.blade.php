@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 700px;">
        <img src="{{ asset('storage/' . $artikel->thumbnail) }}" class="card-img-top" alt="{{ $artikel->title }}">
        <div class="card-body">
            <h2 class="card-title">{{ $artikel->title }}</h2>
            <p class="card-text">{!! nl2br(e($artikel->content)) !!}</p>
            <span class="badge bg-secondary">{{ $artikel->status }}</span>
            <br>
            <div class="d-flex justify-content-between mt-3">
            <a href="{{ route('artikel.index') }}" class="btn btn-primary mt-3">Kembali</a>
            <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-warning mt-3">Edit</a>
            </div>
             </div>
    </div>
</div>
@endsection