@extends('utama')
@section('content')

<div class="col-12 mt-3 ml-2">
    <a href="{{ url('produks') }}" class="btn btn-success">
        Back
    </a>

    <div class="row mt-4">
        <div class="col-auto d-none d-sm-block">
            <h2> Tambah Data <strong>Produk</strong></h2>
        </div>
    </div>

    <div class="col-12 mt-3">
        <div class="card">
            <form action="{{ url('produks') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label"><b>Merek</b><span style="color: red">*</span></label>
                        <input type="text" name="merk" class="form-control @error('merk') is-invalid @enderror" placeholder="Merk" value="{{ old('merk') }}" autofocus>
                        @error('merk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Tipe</b><span style="color: red">*</span></label>
                        <input type="text" name="tipe" class="form-control @error('tipe') is-invalid @enderror" placeholder="Tipe" value="{{ old('tipe') }}" autofocus>
                        @error('tipe')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Warna</b><span style="color: red">*</span></label>
                        <input type="text" name="warna" class="form-control @error('warna') is-invalid @enderror" placeholder="Warna" value="{{ old('warna') }}">
                        @error('warna')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Harga</b><span style="color: red">*</span></label>
                        <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Harga" value="{{ old('harga') }}">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Stok</b><span style="color: red">*</span></label>
                        <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" placeholder="Stok" value="{{ old('stok') }}">
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection