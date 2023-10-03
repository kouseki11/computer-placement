@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Computer Dashboard</h1>
</div>

@if (session('successAdd'))
<script>
    Swal.fire(
    'Berhasil Menambahkan Computer!',
    '',
    'success'
    )
</script>
@endif

@if (session('successEd'))
<script>
    Swal.fire(
    'Berhasil Mengedit Computer!',
    '',
    'success'
    )
</script>
@endif

@if (session('successDel'))
<script>
    Swal.fire(
    'Berhasil Menghapus Computer!',
    '',
    'success'
    )
</script>
@endif

<div class="table-responsive col-lg-8">
  <a href="/dashboard/computers/create" class="btn btn-primary mb-3">Create New Computer</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Computers</th>
          <th scope="col">Date</th>
          <th scope="col">Status</th>
          <th scope="col">Room</th>
          <th scope="col">Brand</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($computers as $computer)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>K {{ $computer->no_computer }}</td>
          <td>{{ $computer->date }}</td>
          <td>{{ $computer->status }}</td>
          <td>{{ $computer->room === null ? 'Belum di Tempatkan' : $computer->room->name }}</td>
          <td>{{ $computer->brand->name }}</td>
          <td>
            <a href="/dashboard/computers/{{ $computer->id }}/edit"  class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/computers/{{ $computer->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
            <button  class="badge bg-danger border-0" onclick="return confirm('Yakin ?')"><span data-feather="x-circle"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection