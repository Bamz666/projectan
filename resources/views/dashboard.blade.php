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
                <a href="#">Data Mahasiswa</a>
            </li>
        </ul>
        <div class="col-md-9" style="margin-left: 30px">
            <a href="{{ route('login')}}">
                <button class="btn btn-md btn-primary btn-round float-right">
                 Login
                </button>
            </a>
        </div>   
    </div>
 
    {{-- buat ngecek apakah variabel status ada nilainya atau gak --}}
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"> 
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2 mt-1">
                            <h4 class="page-title float-left">Data Mahasiswa</h4>
                        </div>
                        <div class="col-md-10">
                            <form action="{{ route('dashboard')}}" method="get" class="float-right">
                                <input style="width: 70%" type="text" name="search" id="" class="form-control d-inline">
                                <button type="submit" class="btn btn-secondary d-inline mb-1">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>            
                </div>
                <div class="card-body">
                    <table class="table mt-1">
                        <thead>
                            <tr>
                                <th style="width:5%">No</th>
                                <th style="width:18%">Mata Kuliah</th>
                                <th style="width:10%">NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th style="width:12%">Huruf Mutu</th>
                                <th style="width:8%">SKS</th>
                                <th>Total Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $item->nama_matakuliah}}</td>
                                <td>{{ $item->nim}}</td>
                                <td>{{ $item->nama}}</td>
                                <td>{{ $item->huruf_mutu}}</td>
                                <td>{{ $item->sks}}</td>
                                <td>{{ $item->nilai_angka}}</td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Jumlah</td>
                                <td>{{ $sum }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Rata-rata</td>
                                <td>{{ number_format($avg, 1) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection