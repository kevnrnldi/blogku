@extends('layout')

@section('content')

    <div class="container mt-5">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
        <label for="title" class="form-label"  >Judul Artikel</label>
        <input type="text" class="form-control" value={{ $artikel->title }} id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="thumbnail" class="form-label">Thumbnail</label>
        <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*"  >
    </div>
    <div class="mb-3">
        <label for="content" class="form-label"  >Isi Artikel</label>
        <textarea class="form-control" id="content" name="content" rows="9" required>{{ $artikel->content }} </textarea>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label"  req>Status</label>
        <select class="form-control" id="status" name="status" value={{ $artikel->status }} required>
            <option value="Publish">Publish</option>
            <option value="Draft" selected>Draft</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

        <button type="button" class="btn btn-primary mt-2"><a href="{{  route('artikel.index') }}" class="text-white text-decoration-none fw-bold">Kembali</a></button>
    </div>


@endsection