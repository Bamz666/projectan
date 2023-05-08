@extends('template.main')
@section('konten')
<div class="page-inner">
    <div class="page-header">
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="fas fa-angle-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Master Data</a>
            </li>
            <li class="separator">
                <i class="fas fa-angle-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Data Nilai</a>
            </li>
            <li class="separator">
                <i class="fas fa-angle-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Tambah Data Nilai</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Data Nilai</div>
                </div>
                <form action="{{ route('nilai.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jd">Nama Mahasiswa</label>
                                            <select name="id_mahasiswa" id="" class="form-control {{ $errors->first('id_mahasiswa') ? "is-invalid":""}}">
                                                <option hidden>-== Pilih Mahasiswa ==-</option>
                                                @foreach ($data as $item)
                                                    <option value="{{ $item->id_mahasiswa}}">
                                                    {{ $item->nama}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('id_mahasiswa')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jd">Matkul</label>
                                            <select name="id_matakuliah" id="" class="form-control {{ $errors->first('id_matakuliah') ? "is-invalid":""}}">
                                                <option hidden>-== Pilih Matkul ==-</option>
                                                @foreach ($matkul as $item)
                                                    <option value="{{ $item->id_matakuliah}}">
                                                    {{ $item->nama_matakuliah}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('id_matakuliah')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nilai</label>
                                            <input type="text" id="nilai" name="nilai_angka" onchange="getValue()" class="form-control {{$errors->first('nilai_angka')?"is-invalid":""}}" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                            @error('nilai_angka')
                                            <div class="text-danger mt-2">
                                              {{$message}}
                                            </div>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Grade</label>
                                            <input type="text" class="form-control {{$errors->first('huruf_mutu')?"is-invalid":""}}" readonly id="grade" name="grade">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <center>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection