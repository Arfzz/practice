@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

     <div class="mb-3">
        @auth
        <div class="card">
            <div class="card-header justify-content-betweeen align-items-center">
                Profil Pengguna
            </div>
            <div class="card-body">
                <p>Nama Pengguna: {{ Auth::user()->username }}</p>
                <p>Email: {{ Auth::user()->email }}</p>
                <p>Alamat: {{ Auth::user()->alamat }}</p>
            </div>
            
        </div>
        @endauth
     <div class="mt-3 mb-3">
        <h1> Galeri Nepergram</h1>
     </div>
    </div>
    @if (!$foto || $foto->isEmpty())
    <h3 class="d-flex justify-content-center align-items-center vh-100">Foto Tidak Ada</h3>
    @else
        @foreach ($foto as $item)
        <div class="col-md-6 col-lg-4 mb-4">  
            <div class="card rounded-3 shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class=" align-items-center">
                        <h5 class="card-title mt-3">{{ $item->judul }}</h5>     
                    </div>

                    @if ($item->user_id == auth()->id())
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('foto.edit', $item->id) }}">Edit</a></li>
                            <li>
                                <form action="{{ route('foto.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item">Hapus</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>
            
                <div class="card-body">
                    <img src="{{ asset('storage/' . $item->lokasi) }}" class="card-img-top" alt="{{ $item->judul }}">
                    <hr class="my-3">
                     
                    <p class="card-text">Uploaded by: {{ $item->user->username }}</p>
                    <p class="card-text">{{ $item->deskripsi }}</p>
                    <p style="font-size: 14px">Uploaded At: {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</p>
                </div>
            
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <form action="{{route('like.index',$item->id)}}" method="post">
                            @csrf
                            
                            <button type="submit" class="btn btn-sm">
                                <i class="far fa-heart"></i> {{ $item->like->count() }} Disukai
                            </button>
                        </form>

                        <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">
                            <i class="far fa-comment"></i> {{ $item->komen->count() }} Komentar
                        </button>
                                
                            

                        <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">komentar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body mb-3">
                                        @foreach($item->komen as $komen)
                                        <div class="d-flex justify-content-between aligns-items-center">
                                            <div class="">
                                                <h5>{{$komen->user->username}}</h5>
                                                <p>{{$komen->isi_komen}}</p>
                                            </div>
                                            @auth
                                            @if ($komen->user->id==Auth::user()->id)
                                            <div class="ml-auto">
                                                <form action="{{route('komen.destroy',$komen->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">hapus</button>
                                                </form>
                                            </div>                                        
                                            @endif      
                                            @endauth
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('komen.store',$item->id)}}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <textarea name="isi_komen" rows="5" cols="55" class="form-label"></textarea>
                                            </div>
                                            <button class="btn btn-primary" type="submit">post</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    @endif

</div>
@endsection
