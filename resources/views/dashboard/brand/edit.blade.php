@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Brand</h1>
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
<form method="post" action="/dashboard/brands/{{ $brand->id}}" class="mb-5">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Brand</label>
      <input type="text" class="form-control" id="name" name="name" required autofocus value="{{ old('name', $brand->name) }}"> 
    </div>

    <button type="submit" class="btn btn-primary">Update Brand</button>
  </form>
</div>


@endsection