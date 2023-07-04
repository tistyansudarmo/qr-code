@extends('dashboard')

@section('container')
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Qr Code</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach ($user as $users)
          
      <th scope="row">1</th>
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