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
                <a href="{{ route('admin')}}">Data Mahasiswa</a>
            </li>
            <li class="separator">
                <i class="fas fa-angle-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Edit Data Mahasiswa</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Data  Mahasiswa: {{ $edit['nama']}}</div>
                </div>
                <form action="{{ route('admin.update', $edit['id_mahasiswa']) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="jd">Nama Mahasiswa</label>
                                            <input type="text" value="{{ $edit['nama']}}" name="nama" class="form-control" id="jd" placeholder="Masukkan nama">                                           
                                            @error('nama')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror 
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="jd">NIM Mahasiswa</label>
                                            <input type="text" value="{{ $edit['nim']}}" name="nim" class="form-control" id="jd" placeholder="Masukkan nim">                                           
                                            @error('nim')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                            @enderror 
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