@extends('layouts.main')

@section('container')

<div class="container" style="margin-top:80px;">
    <div class="border-dark border-bottom d-flex justify-content-between">
        <p class="">Wikrama | {{  $computers->count() }} {{ $count }}</p>
        <p class=""><a href="/" class="text-decoration-none" style="color: #6366f1">Good</a> | <a href="/broken" class="text-decoration-none text-danger">Broken</a></p>
    </div>

    @if ($computers->count())
    <h1 class="mb-3 mt-3 text-center">{{ $title }}</h1>

  <div class="container mt-4">
    <div class="row">
        @foreach ($computers as $computer)
        <div class="col-md-4 mb-3">
            <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                <div class="position-absolute bg-dark px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/?brand={{ $computer->brand->slug }}" class="text-white text-decoration-none">{{ $computer->brand->name }}</a></div>
                <img src="https://th.bing.com/th/id/OIP.xTsRB8RexP2ItYgJ53y7bAHaEM?pid=ImgDet&rs=1" class="card-img-top" alt="{{ $computer->brand->name }}">
                <div class="card-body">
                  <h5 class="card-title">{{ $computer->name }} {{ $computer->no_computer }}</h5>
                  <ul class="list-group list-group-flush">
                    @if( $computer->room === null )
                    <li class="list-group-item">Room  : Belum di Tempatkan</li>
                    @else
                    <li class="list-group-item"><a href="/?room={{ $computer->room->slug }}" class="text-dark text-decoration-none">Room  : {{ $computer->room->name }}</a></li>
                    @endif
                    <li class="list-group-item">Status : {{ $computer->status }}</li>
                    @if ($computer->status === "New")
                    <li class="list-group-item">Date  : {!! date('j F, Y', strtotime($computer->date))!!}</li>
                    @else
                    <li class="list-group-item">Date  : {!! date('j F, Y', strtotime($computer->repaired_time))!!}</li>
                    @endif
                  </ul>
                  <div class="card-body">
                   <form action="/broken/{{ $computer['id'] }}" method="post" id="create-form" class="w-75">
                        @csrf
                    <a href="{{ route('brokenComputer', $computer->id) }}" class="btn btn-danger">Broken</a>
                    </form>
                  </div>
                </div>
              </div>
        </div>
        @endforeach
    </div>
  </div>
  @else
  <p class="text-center fs-4 mt-3">No computer found.</p>
  @endif

</div>

<div class="d-flex justify-content-center">
  {{ $computers->links() }}
  </div>

@endsection