@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Computer</h1>
</div>


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="col-lh-8">
<form method="post" action="/dashboard/computers/{{ $computer->id}}" class="mb-5">
  @method('put')
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" required autofocus value="{{ old('name', $computer->name) }}"> 
    </div>

    <div class="mb-3">
      <label for="no_computer" class="form-label">No</label>
      <input type="number" class="form-control" id="no_computer" name="no_computer" required autofocus value="{{ old('no_computer', $computer->no_computer) }}"> 
    </div>

    <div class="mb-3">
      <label for="date" class="form-label">Date</label>
      <input type="date" class="form-control" id="date" name="date" required autofocus value="{{ old('date', $computer->date) }}"> 
    </div>

    <div class="mb-3">
        <label for="room" class="form-label">Room</label>
        <select class="form-select" name="room_id">
          <option value="" hidden>Select Room</option>
            @foreach($rooms as $room)
            @if(old('room_id', $computer->room_id) == $room->id)
            <option value="{{ $room->id }}" selected>{{ $room->name }}</option>
            @else
            <option value="{{ $room->id }}">{{ $room->name }}</option>
            @endif
            @endforeach
          </select>
      </div>

    <div class="mb-3">
      <label for="brand" class="form-label">Brand</label>
        <select class="form-select" name="brand_id">
          <option value="" hidden>Select Brand</option>
            @foreach($brands as $brand)
            @if(old('brand_id', $computer->brand_id) == $brand->id)
            <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
            @else
            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endif
            @endforeach
          </select>
      </div>

      
    <button type="submit" class="btn btn-primary">Update Computer</button>
  </form>
</div>

@endsection