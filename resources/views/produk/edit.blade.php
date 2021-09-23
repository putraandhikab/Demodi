@extends('utama')
@section('content')

<div class="col-12 mt-3 ml-2">
    <a href="{{ url('produks') }}" class="btn btn-success">
        Back
    </a>

    <div class="row mt-4">
        <div class="col-auto d-none d-sm-block">
            <h2> Edit Data <strong>Produk</strong></h2>
        </div>
    </div>

    <div class="col-12 mt-3">
        <div class="card">
            <form action="{{ url('produks/'.$produk->id_produk) }}" method="post">
                @method('patch')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label"><b>Merek</b></label>
                        <input type="text" name="merk" class="form-control @error('merk') is-invalid @enderror" value="{{ $produk->merk }}" placeholder="Merk" autofocus>
                        @error('merk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Tipe</b></label>
                        <input type="text" name="tipe" class="form-control @error('tipe') is-invalid @enderror" value="{{ $produk->tipe }}" placeholder="Tipe" autofocus>
                        @error('tipe')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Warna</b></label>
                        <input type="text" name="warna" class="form-control @error('warna') is-invalid @enderror" value="{{ $produk->warna }}" placeholder="Warna">
                        @error('warna')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Harga</b></label>
                        <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ $produk->harga }}" placeholder="Harga">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Stok</b></label>
                        <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ $produk->stok }}" placeholder="Stok">
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection