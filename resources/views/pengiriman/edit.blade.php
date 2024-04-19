@extends('master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pengiriman</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
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
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Mengubah pengiriman</h3>
                                <div class="alert alert-danger" style="display: none;">
                                    <strong>Error!</strong> <span id="error-message"></span>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="edit_pengiriman">
                                <div class="card-body">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id_barang" id="id_barang" value="{{ $barang->id }}">
                                    <input type="hidden" name="id_pengiriman" id="id_pengiriman" value="{{ $pengiriman_detail->id }}">

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Resi</label>
                                                <input readonly type="text" class="form-control" id="resi"
                                                    placeholder="Enter Kode pengiriman" value="{{ $pengiriman_detail->resi }} ">
                                            </div>
                                        </div>
                                            
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Barang</label>
                                                <input type="text" class="form-control" id="nama_barang"
                                                    placeholder="Masukkan Nama Barang" value="{{ $barang->nama_barang }}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Berat Barang</label>
                                                <input type="number" class="form-control" id="berat_barang" placeholder="Masukkan Berat (Kg)" value="{{ $barang->berat_barang }}">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Pengirim</label>
                                                <input type="text" class="form-control" id="nama_pengirim"
                                                    placeholder="Masukkan Nama Pengirim" value="{{ $pengiriman_detail->nama_pengirim }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Telepon Pengirim</label>
                                                <input type="text" class="form-control" id="telepon_pengirim"
                                                    placeholder="Masukkan Telepon Pengirim" value="{{ $pengiriman_detail->tlpn_pengirim }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Alamat Pengirim</label>
                                                <input type="text" class="form-control" id="alamat_pengirim"placeholder="Masukkan Alamat Pengirim" value="{{ $pengiriman_detail->alamat_pengirim }}">
                                            </div>
                                            <button id="cek_harga" type="button" class="btn btn-primary">Cek Harga</button>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Penerima</label>
                                                <input type="text" class="form-control" id="nama_penerima"
                                                    placeholder="Masukkan nama Penerima"  value="{{$pengiriman_detail->nama_penerima }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Telepon Penerima</label>
                                                <input type="text" class="form-control" id="telepon_penerima"
                                                    placeholder="Masukkan Telepon Penerima" value="{{$pengiriman_detail->tlpn_penerima }}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Kabupaten</label>
                                                <select name="kabupaten" id="kabupaten" class="form-control">
                                                    <option value="">Pilih Kabupaten</option>
                                                    @foreach ($kabupaten as $i)
                                                        <option value="{{ $i->id_wilayah }}" {{ $i->id_wilayah == $wilayah ? 'selected' :'' }} >{{ $i->id_wilayah }} - {{ $i->nama_wilayah }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Alamat Penerima</label>
                                                <input type="text" class="form-control" id="alamat_penerima"
                                                    placeholder="Masukkan Alamat Penerima" value="{{$pengiriman_detail->alamat_penerima }}">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Estimasi</label>
                                                <input readonly type="text" class="form-control" id="estimasi" value="{{ $estimasi }}"
                                                   >
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Total Harga</label>
                                                <input readonly type="text" class="form-control" id="total_harga" value="{{$pengiriman_detail->total_bayar }}"
                                                    >
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Kurir</label>
                                                <select name="kurir" id="kurir" class="form-control">
                                                    <option value="">Pilih Kurir</option>
                                                    
                                                    @foreach ($kurirall as $i)
                                                        <option value="{{ $i->id }} " {{ $kurir->id == $i->id ? 'selected' : '' }}>{{ $i->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Submit</button>
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