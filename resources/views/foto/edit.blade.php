@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('foto.update', $foto->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="card mt-auto">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Edit Photo</h3>
                <div class="dropdown">
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="">Choose Album</label>
                    <select class="form-select" name="album_id" aria-label="Default select example">
                        @foreach($album as $item)
                        <option value="{{ $item->id}}" {{ old('album_id', $foto->album_id) == $item->id ? 'selected' : '' }}>
                            {{$item->nama}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Title</label>
                    <input type="text" name="judul" value="{{ old('judul', $foto->judul) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control">{{'deskripsi', $foto->deskripsi}}</textarea>
                </div>
                  {{-- <div class="mb-3">
                    <label for="">Upload photo</label>
                    <input type="file" name="lokasi" id="" cols="30" rows="10" value="{{ old('lokasi', $foto->lokasi) }}" class="form-control"> 
                </div> --}}

            </div>
            <div class="card-footer text-end">
                <a href="{{route('home')}}" class="btn btn-primary rounded-4" type="submit">kembali</a>
                <button class="btn btn-primary rounded-4" type="submit">create</button>
            </div>
        </div>
    </form>
</div>
@endsection