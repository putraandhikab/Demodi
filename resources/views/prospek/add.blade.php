@extends('utama')
@section('content')

<div class="col-12 mt-3 ml-2">
    <a href="{{ url('prospek') }}" class="btn btn-success">
        Back
    </a>

    <div class="row mt-4">
        <div class="col-auto d-none d-sm-block">
            <h2> Tambah Data <strong>Prospek</strong></h2>
        </div>
    </div>

    <div class="col-12 mt-3">
        <div class="card">
            <form action="{{ url('prospek') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-header mt-2">
                    <h3>Prospek Profile</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label"><b>Nama Prospek</b></label>
                        <input type="text" name="nama_profile" class="form-control @error('nama_profile') is-invalid @enderror" placeholder="Nama Lengkap" autofocus>
                        @error('nama_profile')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Nomor Handphone</b></label>
                        <input type="number" name="nohp_profile" class="form-control @error('nohp_profile') is-invalid @enderror" placeholder="Nomor Telepon">
                        @error('nohp_profile')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Alamat Profile</b></label>
                        <input type="text" name="alamat_profile" class="form-control @error('alamat_profile') is-invalid @enderror" placeholder="Alamat Prospek">
                        @error('alamat_profile')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Longtitude</b></label>
                        <input type="text" name="longtitude" class="form-control @error('longtitude') is-invalid @enderror" placeholder="Longtitude">
                        @error('longtitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Latitude</b></label>
                        <input type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror" placeholder="Latitude">
                        @error('latitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-header mt-2">
                    <h3>Prospek Interview</h3>
                </div>
                <div class=card-body>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Metode Pembelian</label>
                        <select class="form-control @error('metode_pembelian') is-invalid @enderror" id="exampleFormControlSelect1" name="metode_pembelian">
                            <option value="">--Pilih--</option>
                            <option value="cash">Cash</option>
                            <option value="kredit">Kredit</option>
                        </select>
                        @error('metode_pembelian')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kepemilikan Rumah</label>
                        <select class="form-control @error('kepemilikan_rumah') is-invalid @enderror" id="exampleFormControlSelect1" name="kepemilikan_rumah">
                            <option value="">--Pilih--</option>
                            <option value="sendiri">Sendiri</option>
                            <option value="kontrak">Kontrak</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                        @error('kepemilikan_rumah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Akses Kendaraan Ke Rumah</label>
                        <select class="form-control @error('akses_kendaraan') is-invalid @enderror" id="exampleFormControlSelect1" name="akses_kendaraan">
                            <option value="">--Pilih--</option>
                            <option>Jalan Mobil</option>
                            <option>Jalan Motor</option>
                            <option>Tidak Ada</option>
                        </select>
                        @error('akses_kendaraan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Tanggal Pengiriman</b></label>
                        <input type="date" min="<?= date('Y-m-d'); ?>" name="tanggal_pengiriman" class="form-control @error('tanggal_pengiriman') is-invalid @enderror" placeholder="Tanggal Pengiriman">
                        @error('tanggal_pengiriman')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Ketersediaan Dana</label>
                        <select class="form-control @error('ketersediaan_dana') is-invalid @enderror" id="exampleFormControlSelect1" name="ketersediaan_dana">
                            <option value="">--Pilih--</option>
                            <option value="siap">Siap</option>
                            <option value="belum">Belum</option>
                        </select>
                        @error('ketersediaan_dana')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Booking Fee</label>
                        <select class="form-control @error('booking_fee') is-invalid @enderror" id="exampleFormControlSelect1" name="booking_fee">
                            <option value="">--Pilih--</option>
                            <option value="siap">Siap</option>
                            <option value="belum">Belum</option>
                        </select>
                        @error('booking_fee')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Merek</label>
                        <select class="form-control @error('merk') is-invalid @enderror" id="exampleFormControlSelect1" name="merk"  value="{{ old('merk') }}">
                            <option value="">--Pilih--</option>
                            @foreach ($prospek as $item)
                                <option value="{{ $item->merk }}">{{ $item->merk }}</option>
                            @endforeach
                        </select>
                        @error('merk')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipe</label>
                        <select class="form-control @error('tipe') is-invalid @enderror" id="exampleFormControlSelect1" name="tipe"  value="{{ old('tipe') }}">
                            <option value="">--Pilih--</option>
                            @foreach ($prospek as $item)
                                <option value="{{ $item->tipe }}">{{ $item->tipe }}</option>
                            @endforeach
                        </select>
                        @error('tipe')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Down Payment</label>
                        <select class="form-control @error('down_payment') is-invalid @enderror" id="exampleFormControlSelect1" name="down_payment">
                            <option value="">--Pilih--</option>
                            <option value="20%">20%</option>
                            <option value="30%">30%</option>
                            <option value="40%">40%</option>
                        </select>
                        @error('down_payment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipe Asuransi</label>
                        <select class="form-control @error('tipe_asuransi') is-invalid @enderror" id="exampleFormControlSelect1" name="tipe_asuransi">
                            <option value="">--Pilih--</option>
                            <option value="kombinasi">Kombinasi</option>
                            <option value="all risk">All Risk</option>
                            <option value="TLO">TLO</option>
                        </select>
                        @error('tipe_asuransi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Discount <span style="color: red">(Masukkan dalam bentuk Desimal)</span></label>
                        <input type="text" name="diskon" class="form-control @error('diskon') is-invalid @enderror" placeholder="Discount" >
                        @error('diskon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Sudah Ada Penawaran Lain</label>
                        <select class="form-control @error('penawaran_lain') is-invalid @enderror" id="exampleFormControlSelect1" name="penawaran_lain">
                            <option value="">--Pilih--</option>
                            <option value="ya">Sudah</option>
                            <option value="tidak">Belum</option>
                        </select>
                        @error('penawaran_lain')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Leasing lain (untuk metode kredit)</label>
                        <select class="form-control @error('leasing') is-invalid @enderror" id="exampleFormControlSelect1" name="leasing">
                            <option value="">--Pilih--</option>
                            <option>Sudah</option>
                            <option>Belum</option>
                        </select>
                        <input type="text" name="leasing" class="form-control" placeholder="Masukkan jika pernah memiliki kredit di leasing lain" >
                        @error('leasing')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Kunjungan Selanjutnya</b></label>
                        <input type="date" min="<?= date('Y-m-d'); ?>" name="kunjungan_selanjutnya" class="form-control @error('kunjungan_selanjutnya') is-invalid @enderror" placeholder="Kunjungan Selanjutnya">
                        @error('kunjungan_selanjutnya')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label @error('foto') is-invalid @enderror"><b>Foto</b></label>
                        <input type="file" name="foto">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection