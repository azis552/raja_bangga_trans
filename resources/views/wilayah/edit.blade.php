@extends('master')
@section('content')
<div class="alert alert-danger" style="display: none;">
    <strong>Error!</strong> <span id="error-message"></span>
</div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">wilayah</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                            <li class="breadcrumb-item active">wilayah</li>
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
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Edit wilayah</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="edit_wilayah">
                                <div class="card-body">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kode Wilayah</label>
                                        <input type="text" class="form-control" id="kode_wilayah"
                                            placeholder="Enter name" value="{{ $data->id_wilayah }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Wilayah</label>
                                        <input type="text" class="form-control" id="nama_wilayah"
                                            placeholder="Enter name" value="{{ $data->nama_wilayah }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Estimasi</label>
                                        <input type="text" class="form-control" id="estimasi"
                                            placeholder="Enter name" value="{{ $data->estimasi }}">
                                    </div>
                                    
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Edit</button>
                                </div>
                            </form>
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