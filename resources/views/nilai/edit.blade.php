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
                <a href="{{ route('admin')}}">Data Nilai</a>
            </li>
            <li class="separator">
                <i class="fas fa-angle-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Edit Data Nilai</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Data  Nilai</div>
                </div>
                <form action="{{ route('nilai.update', $edit['id_nilai']) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jd">Nama Mahasiswa</label>
                                            <select name="id_mahasiswa" id="" class="form-control {{ $errors->first('id_mahasiswa') ? "is-invalid":""}}">
                                                <option hidden>-== Pilih Kategori ==-</option>
                                                @foreach ($nama as $item)
                                                    <option @if ($item->id_mahasiswa == $edit['id_mahasiswa'])
                                                    {{ "selected" }}
                                                    @endif value="{{ $item->id_mahasiswa}}">
                                                    {{ $item->nama}}
                                                    </option>
                                                @endforeach
                                            </select>                                         
                                            @error('judul')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jd">Nama Matkul</label>
                                            <select name="id_matakuliah" id="" class="form-control {{ $errors->first('id_matakuliah') ? "is-invalid":""}}">
                                                <option hidden>-== Pilih Matkul ==-</option>
                                                @foreach ($matkul as $item)
                                                    <option @if ($item->id_matakuliah == $edit['id_matakuliah'])
                                                    {{ "selected" }}
                                                    @endif value="{{ $item->id_matakuliah}}">
                                                    {{ $item->nama_matakuliah}}
                                                    </option>
                                                @endforeach
                                            </select>                                         
                                            @error('judul')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jd">Nilai</label>
                                            <input type="text" value="{{ $edit['nilai_angka']}}" name="nilai" class="form-control" id="jd" placeholder="Masukkan nilai">                                           
                                            @error('nilai')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
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
                        <button type="submit" class="btn btn-secondary"><i class="icon-refresh"></i> Update</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection