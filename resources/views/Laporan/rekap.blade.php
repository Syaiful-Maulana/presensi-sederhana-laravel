@extends('main')

@section('title', 'Rekap Presensi')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Rekap Absensi Karyawan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Rekap Absensi Karyawan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content" >
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="card card-info card-outline">
              <div class="card-header">Lihat Data</div>
              <div class="card-body">
                
                <div class="form-group">
                    <label for="label">Tanggal Awal</label>
                    <input type="date" name="tglawal"  id="tglawal" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="label">Tanggal Akhir</label>
                    <input type="date" name="tglakhir"  id="tglakhir" class="form-control">
                </div>
                
                <div class="form-group">
                    <a href="" onclick="this.href='/filter-data/' + document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value" class="btn btn-primary col-md-12">
                    Lihat
                    <i class="fas fa-print"></i>
                    </a>
                </div>
                
                <div class="form-group">
                    <table border="1">
                        <tr>
                            <th>No.</th>
                            <th>Pegawai</th>
                            <th>Tanggal</th>
                            <th>Masuk</th>
                            <th>Keluar</th>
                            <th>Jumlah Jam Kerja</th>
                        </tr>
                        @foreach ($presensi as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $item->user->name}}</td>
                                <td>{{ $item->tgl}}</td>
                                <td>{{ $item->jammasuk}}</td>
                                <td>{{ $item->jamkeluar}}</td>
                                <td>{{ $item->jamkerja}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
              </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
 

@endsection
