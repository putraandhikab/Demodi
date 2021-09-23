@extends('utama')
@section('content')

<div class="col-12 mt-3 ml-2">
    <a href="{{ url('prospek') }}" class="btn btn-success">
        Back
    </a>

    <div class="row mt-4">
        <div class="col-auto d-none d-sm-block">
            <h2> Detail Data <strong>Prospek</strong></h2>
        </div>
    </div>

    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-header">
                <h4><strong> Prospek Profile </strong></h4>
            </div>
                @foreach ($prospek as $item)
                <div class="card-body">
                    <img src="images/{{ $item->foto }}" width="100px" style="display:block" class="mb-5">
                    <div class="form-group">
                        <label class="form-label"><b>Nama Prospek</b></label>
                        <input type="text" name="nama_profile" class="form-control" value="{{ $item->nama_profile }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Nomor Handphone</b></label>
                        <input type="number" name="nohp_profile" class="form-control" value="{{ $item->nohp_profile }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Alamat Profile</b></label>
                        <input type="text" name="alamat_profile" class="form-control" value="{{ $item->alamat_profile }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Longtitude</b></label>
                        <input type="text" name="longtitude" class="form-control" value="{{ $item->longtitude }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Latitude</b></label>
                        <input type="text" name="latitude" class="form-control" value="{{ $item->latitude }}" readonly>
                    </div>
                </div>

                    <div class="card-header">
                        <h4><strong>Prospek Interview</strong></h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label"><b>Metode Pembelian</b></label>
                            <input type="text" name="metode" class="form-control" value="{{ $item->metode_pembelian }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><b>Kepemilikan Rumah</b></label>
                            <input type="text" name="rumah" class="form-control" value="{{ $item->kepemilikan_rumah }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><b>Akses Kendaraan</b></label>
                            <input type="text" name="akses" class="form-control" value="{{ $item->akses_kendaraan }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><b>Tanggal Pengiriman Unit</b></label>
                            <input type="date" name="tgl_kirim" class="form-control" value="{{ $item->tanggal_pengiriman }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><b>Ketersediaan Dana</b></label>
                            <input type="text" name="dana" class="form-control" value="{{ $item->ketersediaan_dana }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><b>Booking Fee</b></label>
                            <input type="text" name="fee" class="form-control" value="{{ $item->booking_fee }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><b>Merek</b></label>
                            <input type="text" name="merk" class="form-control" value="{{ $item->merk }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><b>Tipe</b></label>
                            <input type="text" name="tipe" class="form-control" value="{{ $item->tipe }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><b>Down Payment</b></label>
                            <input type="text" name="payment" class="form-control" value="{{ $item->down_payment }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><b>Tipe Asuransi</b></label>
                            <input type="text" name="asuransi" class="form-control" value="{{ $item->tipe_asuransi }}" readonly>
                        </div>
                        <div class="form-group" id="myForm">
                            <label class="form-label"><b>Discount</b></label>
                            <input type="text" name="discount" class="form-control" value="{{ $item->diskon }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><b>Sudah Ada Penawaran Lain</b></label>
                            <input type="text" name="penawaran" class="form-control" value="{{ $item->penawaran_lain }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><b>Leasing</b></label>
                            <input type="text" name="leasing" class="form-control" value="{{ $item->leasing }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><b>Kunjungan Selanjutnya</b></label>
                            <input type="date" name="kunjungan" class="form-control" value="{{ $item->kunjungan_selanjutnya }}" readonly>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
</div>

@endsection