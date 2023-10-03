@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Room Dashboard</h1>
</div>

@if (session('successAdd'))
<script>
    Swal.fire(
    'Berhasil Menambahkan Room!',
    '',
    'success'
    )
</script>
@endif

@if (session('successEd'))
<script>
    Swal.fire(
    'Berhasil Mengedit Room!',
    '',
    'success'
    )
</script>
@endif

@if (session('successDel'))
<script>
    Swal.fire(
    'Berhasil Menghapus Room!',
    '',
    'success'
    )
</script>
@endif

<div class="table-responsive col-lg-8">
  <a href="/dashboard/rooms/create" class="btn btn-primary mb-3">Create New Room</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Rooms</th>
          <th scope="col">Jumlah Komputer</th>
          <th scope="col">Slug</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($rooms as $room)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $room->name }}</td>
          <td>{{ $room->computers->count() }}</td>
          <td>{{ $room->slug }}</td>
          <td>
            <button type="button" class="badge bg-warning btn btn-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $room->id }}"><span data-feather="edit"></button>
            {{-- <a href="/dashboard/rooms/{{ $room->id }}/edit"  class="badge bg-warning"><span data-feather="edit"></span></a> --}}
            <form action="/dashboard/rooms/{{ $room->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
            <button  class="badge bg-danger border-0" onclick="return confirm('Yakin ?')"><span data-feather="x-circle"></span></button>
            </form>
          </td>
        </tr>

        {{-- Modal --}}
  <div class="modal fade" id="exampleModal{{ $room->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Room</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="/dashboard/rooms/{{ $room->id}}">
            @method('put')
            @csrf
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Room</label>
              <input type="text" class="form-control" id="name" name="name" required autofocus value="{{ old('name', $room->name) }}"> 
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update Room</button>
        </div>
      </div>
    </div>
  </div>

        @endforeach
      </tbody>
    </table>
  </div>

  

@endsection