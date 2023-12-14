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
                <div class="col-8">
                    @foreach ($data_diskon as $d)
                        <div class="card">
                            <div class="table-responsive">
                                <form method="POST" action="/setdiskon/update/{{ $d->id }}">
                                    @csrf
                                    <div class="card-body">
                                        <h4 class="card-title">Diskon</h4>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>total belanja</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span
                                                                class="input-group-text">Rp</span>
                                                        </div>
                                                        <input type="number" class="form-control" name="total_belanja"
                                                            value="{{ $d->total_belanja }}" placeholder="total belanja....."
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>diskon</label>
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form-control" name="diskon"
                                                            value="{{ $d->diskon }}" placeholder="diskon....." required>
                                                        <div class="input-group-append"><span
                                                                class="input-group-text">%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="fa fa-save"></i> save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
    </div>
@endsection
