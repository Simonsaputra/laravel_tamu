@extends('app')
@section('content')
<div class="card">
      @if (session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
      @endif
     <div class="card-header">
      Data Buku Tamu
      <a href="{{url('admin/form-tambah')}}" class="btn btn-success">Tambah Data</a>
    </div>
    <div class="card-body">
        <table class="table" id="myTable" >
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Telepon</th>
                <th scope="col">Alamat</th>
                <th scope="col">Keperluan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Email</th>
                <th scope="col" style="width : 15%">Aksi</th>
              </tr>
            </thead>
            <t`ody>
                @foreach($data as $key => $item)
              <tr>
                <th scope="row">{{$key + 1 }}</th>
                <td>{{$item->nama}}</td>
                <td>{{$item->tlp}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->keperluan}}</td>
                <td>{{ \Carbon\Carbon::parse($item->created_at)->timezone('Asia/Jakarta')->locale('id')->translatedFormat('l, d F Y H:i:s') }}</td>
                <td>{{$item->email}}</td>
                <td>
                  <div class="row">
                    <div class="col-4">
                      <a href="{{url('admin/form-edit', $item->id)}}" onclick="return confirm('Serius Mau Berubah?');" class="btn btn-warning">Ubah</a>
                    </div>
                    <div class="col-4">
                      <form action="{{url('admin/hapus-data')}}" onclick="return confirm('Mau Di Ilangin?');" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}" >
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        
                    </form>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
  </div>
@endsection

@section('script')
  <script>
    $(document).ready( function () {
        $('#myTable').DataTable()
    } );
  </script>
@endsection