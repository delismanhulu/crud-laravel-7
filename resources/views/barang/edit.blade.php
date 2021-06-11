@extends('master_view/master')
@section('title','CRUD - Edit Data')
@section('container')
<div class="container" style="margin-top: 40px">
    <div class="card" style="border-radius: 8px">
        <div class="card-body">
            <div class="row"> 
                <div class="col">
                    <form action="#" method="GET">
                        <div class="form-row">
                            <div class="col-12 col-md-11 mb-2 mb-md-0">
                                <h5 class="font-weight-bold"> FORM EDIT </h5>
                            </div>
                            <div class="col-12 col-md-1">
                            <a href="{{ url('/barang') }}" class="btn btn-info">Kembali</a>
                            </div>
                        </div>
                    </form>
                    <br>
                </div>

                </div class="col">
                    
                    <form  action="{{ route('barang.update',$barang->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Produk *</label>
                            <input  placeholder="Nama Produk " value="{{ $barang->produk }}" type="text" class="form-control @error('produk') is-invalid @enderror" name="produk">
                            @error('produk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            
                            <div class="col">
                                <div class="form-group">
                                    <label class="font-weight-bold">Jumlah Produk *</label>
                                    <input  placeholder="Jumlah Produk" value="{{ $barang->jumlah }}" type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah">
                                    @error('jumlah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label class="font-weight-bold">Harga Produk *</label>
                                    <input  placeholder="Harga Produk" value="{{ $barang->harga }}" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga">
                                    @error('harga')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
