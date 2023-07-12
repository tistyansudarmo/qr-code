@extends('dashboard')

@section('container')
  <h1 class="h3 mb-4 text-gray-800">Daftar Tamu Undangan</h1>
    <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Qr Code</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($user as $users)
    <tr>
          
      <th scope="row">{{ $loop->iteration }}</th>
      <td>
      <div class="visible-print">
      {!! QrCode::size(100)->generate($users->qr_code); !!}
      </div>
      </td>
      <td>{{ $users->name }}</td>
      <td>{{ $users->alamat }}</td>
      @endforeach
    </tr>
  </tbody>
</table>

@endsection