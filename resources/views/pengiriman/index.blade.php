@extends('master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">pengiriman</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Transaksi</li>
                            <li class="breadcrumb-item active">pengiriman</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <a href="{{ route('pengiriman.create') }}" type="button" class="btn btn-sm btn-primary">Tambah pengiriman</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID pengiriman</th>
                                            <th>Nama pengiriman</th>
                                            <th>Estimasi Tiba</th>
                                            <th>Terakhir diubah</th>
                                            <th>Bukti</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no=1;
                                        @endphp
                                        @foreach ($data as $i)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $i->resi }}</td>
                                                <td>{{ $i->nama_pengirim }}</td>
                                                <td>{{ $i->estimasi }} Hari</td>
                                                <td>{{ $i->updated_at }}</td>
                                                <td><a href="{{ route('pengiriman.cetak_nota',$i->id) }}" type="button" class="btn btn-sm btn-info">Download</a></td>
                                                <td>
                                                    <a href="{{ route('pengiriman.edit',$i->id) }}" type="button" class="btn btn-sm btn-warning">Edit</a>
                                                    <a href="{{ route('track.index',$i->id) }}" type="button" class="btn btn-sm btn-success">Tracking</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
