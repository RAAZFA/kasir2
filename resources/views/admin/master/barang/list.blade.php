@extends('layout.layout')
@section('content')
    <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Table  Barang</h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modalCreate">Create user</button>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>nama barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Harga</th>
                                            <th>STOK</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($data_barang as $row)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $row->nama_barang }}</td>
                                                <td>{{ $row->nama_jenis }}</td>
                                                <td>{{ $row->stok }}</td>
                                                <td>Rp. {{ number_format($row->harga) }}</td>
                                                <td>
                                                    <a href="#modalEdit{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-primary"><i
                                                            class="fa fa-edit"></i>
                                                        edit</a>
                                                    <a href="#modalHapus{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-danger"><i
                                                            class="fa fa-trash"></i>
                                                        hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">CREATE DATA jenis</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="/barang/store">
                            @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" placeholder="Nama barang....." required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Barang</label>
                                <select name="id_jenis" class="form-control">
                                    <option value="" hidden>-- pilih Jenis Barang --</option>
                                    @foreach ($data_jenis as $b)
                                    <option value="{{ $b->id }}" >{{ $b->nama_jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="stok" placeholder="STOCK....." required>
                                <div class="input-group-append"><span class="input-group-text">Pcs</span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" class="form-control" name="harga" placeholder="harga...." required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            @foreach ($data_barang as $d)
            <div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">update DATA barang</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="/barang/update/{{ $d->id }}">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" value="{{ $d->nama_barang }}" placeholder="Nama barang....." required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Barang</label>
                                    <select name="id_jenis" class="form-control">
                                        <option value="{{ $d->id_jenis }}">{{ $d->nama_jenis }}</option>
                                        @foreach ($data_jenis as $b)
                                        <option value="{{ $b->id }}" hidden>{{ $b->nama_jenis }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" name="stok" value="{{ $d->stok }}" placeholder="STOCK....." required>
                                    <div class="input-group-append"><span class="input-group-text">Pcs</span>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="number" class="form-control" name="harga" value="{{ $d->harga }}" placeholder="harga...." required>
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach ($data_barang as $c)
            <div class="modal fade" id="modalHapus{{ $c->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">HAPUS DATA jenis</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <form method="GET" action="/barang/destroy/{{ $c->id }}">
                            @csrf
                        <div class="modal-body">
                            <div class="form-group">
                              <h5>YAKIN MAU HAPUS DATANYA</h5>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- #/ container -->
    </div>
@endsection

