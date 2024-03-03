@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mt-3 mb-3">
                <h1>
                    Album Anda
                </h1>
            </div>
            @foreach($album as $item)
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>{{$item->nama}}</h3>
                    <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('album.edit', $item->id)}}">edit</a></li>
                            <li>
                                <form action="{{route('album.destroy', $item->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="dropdown-item">hapus</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="carouselExampleAutoplaying{{ $item->id }}" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                        <div class="carousel-inner">
                            @if ($item->foto()->exists())
                            @foreach ($item->foto as $foto)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <img src="{{ asset('storage/' . $foto->lokasi) }}" draggable="false" class="object-fit-cover img-fluid">
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying{{ $item->id }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying{{ $item->id }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="card-footer">
                    {{$item->deskripsi}}
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection