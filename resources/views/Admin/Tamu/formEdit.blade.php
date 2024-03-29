@extends('app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 40%">
            <div class="card-header">
              Form Edit Buku Tamu
            </div>
            <div class="card-body">
                <form action="{{url('admin/update-data')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama" value="{{$data->nama}}" >
                    </div>
                    <div class="form-group">
                      <label for="telepon">Telepon</label>
                      <input type="number" class="form-control" name="telepon" id="telepon" aria-describedby="telepon" value="{{$data->tlp}}" >
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input type="text" class="form-control" name="alamat" id="alamat" aria-describedby="alamat" value="{{$data->alamat}}">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" aria-describedby="email" value="{{$data->email}}">

                    </div>
                    <input type="hiddden" value="{{$data->id}}" name="id">
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
            </div>
          </div>
    </div>
@endsection