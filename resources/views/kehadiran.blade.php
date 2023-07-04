@extends('dashboard')

@section('container')
<h1 class="h3 mb-4 text-gray-800">Daftar Kehadiran Undangan</h1>
    <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Waktu</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($kehadiran as $attended)  
    <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $attended->name }}</td>
        <td>{{ $attended->alamat }}</td>
        <td>{{ $attended->created_at }}</td>
        @endforeach
    </tr>
    <tr>
  </tbody>
</table>
@endsection