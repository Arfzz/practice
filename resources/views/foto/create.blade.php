@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('foto.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card mt-auto">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Tambah Foto</h3>
                <div class="dropdown">
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="">Choose Album :</label>
                    <select class="form-select" name="album_id" aria-label="Default select example">
                        @foreach($album as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Title</label>
                    <input type="text" name="judul" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Upload Foto</label>
                    <input type="file" name="lokasi" class="form-control">
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{route('home')}}" class="btn btn-primary rounded-4" type="submit">kembali</a>
                <button class="btn btn-primary rounded-4" type="submit">create</button>
            </div>
        </div>
    </form>
</div>
@endsection