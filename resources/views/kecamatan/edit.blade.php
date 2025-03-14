@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ubah Daftar Kecamatan</div>
                <div class="card-body">
                    <form action="{{route('kecamatan.update',$kecamatan->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Nama Kecamatan</label>
                            <input type="text" name="nama_kecamatan" class="form-control" value="{{ $kecamatan->nama_kecamatan }}" placeholder="Nama Kecamatan" required autofocus>
                            <label>Kode Kecamatan</label>
                            <input type="number" name="kode_kecamatan" class="form-control" value="{{ $kecamatan->kode_kecamatan }}" placeholder="Kode kecamatan" required >
                            <label>Nama Kota</label>
                            <select name="id_kota" class="form-control" required>
                                @foreach ($kota as $data)
                                <option value="{{$data->id}}" {{$data->id == $kecamatan->id_kota ? 'selected' : ''}} >{{$data->nama_kota}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection