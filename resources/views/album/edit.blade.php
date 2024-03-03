@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('album.update', $album->id)}}" method="post">
        @method('PUT')
        @csrf
        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
        <div class="card mt-auto">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Tambah Album</h3>
                <div class="dropdown">
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="">Title</label>
                    <input type="text" name="nama" class="form-control" value="{{old('nama', $album->nama)}}">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control">{{old('deskripsi', $album->deskripsi)}}</textarea>
                </div>
            </div>

            <div class="card-footer text-end">
                <button class="btn btn-primary rounded-4" type="submit">create</button>
            </div>
        </div>
    </form>
</div>
@endsection