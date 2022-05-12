@extends('layouts.admin')

@section('content')
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Transaksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Transaksi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        

      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Transaksi Panding</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Total</th>
                      <th>Bank</th>
                      <th>Status</th>
                      <th style="width: 140px">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($listpanding as $data)

                        <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{"Rp.".number_format($data->total_transfer)}}</td>
                        <td>{{ $data->bank }}</td>
                        <td>{{ $data->status }}</td>
                        <td>
                        <a href="{{ route('transaksibatal', $data->id) }}"> <button type="button" class="btn btn btn-danger btn-xs">Batal</button></a>
                            |
                        <a href="{{ route('transaksiconfirm', $data->id) }}"> <button type="button" class="btn btn btn-success btn-xs">Proses</button></a>
                            
                        </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <br>


      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Transaksi Selesai/Batal</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Total</th>
                      <th>Bank</th>
                      <th>Status</th>
                      <th style="width: 140px">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($listselesai as $data)

                        <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{"Rp.".number_format($data->total_transfer)}}</td>
                        <td>{{ $data->bank }}</td>
                        <td>{{ $data->status }}</td>
                        <td>
                       
                          @if($data->status == "DIKIRIM")
                            <a href="{{ route('transaksiselesai', $data->id) }}"> 
                              <button type="button" class="btn btn-block btn-primary btn-xs">Selesai</button>
                            </a>
                          @elseif($data->status == "PROSES")
                            <a href="{{ route('transaksikirim', $data->id) }}"> 
                              <button type="button" class="btn btn-block btn-success btn-xs">Kirim</button>
                            </a>
                          @elseif($data->status == "SELESAI" || $data->status == "BATAL")
                            <a href="#"> 
                              <button type="button" class="btn btn-block btn-warning btn-xs">Detail</button>
                            </a>
                          @endif

                        </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <br>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
