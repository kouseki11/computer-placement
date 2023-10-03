@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Brand Dashboard</h1>
</div>

@if (session('successAdd'))
<script>
    Swal.fire(
    'Berhasil Menambahkan Brand!',
    '',
    'success'
    )
</script>
@endif

@if (session('successEd'))
<script>
    Swal.fire(
    'Berhasil Mengedit Brand!',
    '',
    'success'
    )
</script>
@endif

@if (session('successDel'))
<script>
    Swal.fire(
    'Berhasil Menghapus Brand!',
    '',
    'success'
    )
</script>
@endif

<div class="table-responsive col-lg-8">
  <a href="/dashboard/brands/create" class="btn btn-primary mb-3">Create New Brand</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Brands</th>
          <th scope="col">Jumlah Komputer</th>
          <th scope="col">Slug</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($brands as $brand)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $brand->name }}</td>
          <td>{{ $brand->computers->count() }}</td>
          <td>{{ $brand->slug }}</td>
          <td>
            <a href="/dashboard/brands/{{ $brand->id }}/edit"  class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/brands/{{ $brand->id }}" method="post" class="d-inline">
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