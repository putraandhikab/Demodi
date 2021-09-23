@extends('utama')
@section('content')
    <div class="col-12 mt-3 ml-2">
        <a href="{{ url('sales') }}" class="btn btn-primary">
            Back
        </a>

        <div class="card mt-3">
            <div class="card">
                <div class="card-header">
                    <h3 style="color: #495057"><b>Pendapatan Sales</b></h3>
                </div>
                <form action="{{ url('cash'.$sales->id_sales) }}" method="post">
                    @method('patch')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label"><b>Nama Sales</b></label>
                            <input type="text" name="nama_sales" class="form-control" value="{{ $sales->nama_sales}}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><b>Pendapatan</b></label>
                            <input type="number" name="pendapatan" class="form-control @error('pendapatan') is-invalid @enderror" value="{{ $sales->pendapatan}}" placeholder="Pendapatan">
                            @error('pendapatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="reset" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection