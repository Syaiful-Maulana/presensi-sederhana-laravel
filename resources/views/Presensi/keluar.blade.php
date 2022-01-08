@extends('main')

@section('title', 'Presensi Keluar')
@push('css')
<link rel="stylesheet" href="{{ asset('assets/toastr/build/toastr.css')}}">
<script src="{{ asset('assets/js/jam.js')}}"></script>
    <style>
        #watch{
            color: rgb(252, 150, 65);
            position: absolute;
            z-index: 1;
            height: 40px;
            width: 700px;
            overflow: show;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            font-size: 10vw;
            -webkit-text-stroke: 3px rgb(210, 65, 36);
            text-shadow: 4px 4px 10px rgba(210, 65, 36, 0.4),
            4px 4px 20px rgba(210, 45, 26, 0.4),
            4px 4px 20px rgba(210, 25, 16, 0.4),
            4px 4px 20px rgba(210, 15, 06, 0.4);
        }
    </style>
@endpush
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Halaman Presensi Keluar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Presensi Keluar</li>
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
              <div class="card-header">Presensi Keluar</div>
              <div class="card-body">
                  <form action="{{url('prosesKeluar')}}" method="POST">
                      @csrf
                      <div class="form-group">
                          <center>
                              <label id="clock" style="font-size: 100px; color: #0A77DE; -webkit-text-stroke: 3px #00ACFE;text-shadow: 4px 4px 10px #36D6FE, 4px 4px 20px #36D6FE, 4px 4px 30px #36D6FE, 4px 4px 40px #36D6FE;">
                              </label>
                          </center>
                      </div>
                      <center>
                          <div class="form-group">
                              <button type="submit" class="btn btn-primary">Klik Untuk Presensi Keluar</button>
                          </div>
                      </center>
                  </form>
              </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
 

@endsection
@push('script')
    <script src="{{ asset('assets/toastr/toastr.js')}}"></script>
    <script>
        @if(Session::has('success'))   
        toastr.success('{{Session::get('success')}}')
        @endif
        </script>
        <script>
            @if(Session::has('error'))   
            toastr.error('{{Session::get('error')}}')
            @endif
        </script>
@endpush