@extends('templete/master')
@section('title','CRUD - Tampil Data')
@section('container')

<div class="container-fluid container" style="margin-top: 40px">
    <div class="card" style="border-radius: 8px">
        <div class="card-body">
            <div class="row ">
                <div class="col">
                    <form action="{{ url('barang') }}" method="GET">
                        <div class="form-row">
                            <div class="col-12 col-md-4 mb-2 mb-md-0">
                                <h5 class="font-weight-bold"> Daftar Barang </h5>
                            </div>

                            <div class="col-12 col-md-6 mb-2 mb-md-0">
                                <input class="form-control" type="text" name="cari" placeholder="Cari Nama Produk disini">
                            </div>
                            <div class="col-12 col-md-1">
                                <button class="btn btn-block btn-info" type="submit">Cari</button>
                            </div>
                            <div class="col-12 col-md-1">
                                <a class="btn btn-block rounded-right btn-primary active" href="{{ url('/barang/create') }}">Input</a>
                            </div>
                        </div>
                    </form>
                    <hr>
                    @if (session('status'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                
                

                </div class="col">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Jumlah Produk</th>
                                <th scope="col">Harga Produk</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @forelse ($barang as $data)
                            <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->produk }}</td>
                            <td>{{ $data->jumlah }}</td>
                            <td>{{ $data->harga }}</td>
                            <td>{{ $data->created_at }}</td>
                            
                            <td class=" text-right">
                                <a class="btn btn-primary active" href="{{ route('barang.edit',$data->id) }}"> Edit</a> 

                                <a href="javascript:void(0)" onclick="$(this).find('form').submit()" class="btn btn-danger active">
                                     Delete 
                                    <form action="{{ route('barang.destroy',$data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </a>
                                
                            </td>
                            </tr>
                        @empty
                        <tr>
                            <td  class="w-100"  colspan ="6">
                                <div class="card alert alert-info">
                                    <div class="d-flex flex-lg-row flex-column align-items-center">
                                        <div class="flex-grow-1 text-lg-start text-center card-text">
                                            <p class="card-caption text-bold"> Data Tidak ditemukan <br> 
                                                <a class="text-decoration-none text-dark " href="https://layanancoding.com">        <b> Read More </b> 
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>

                    {{ $barang->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
