@extends('utama')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-3 col-xl-2 mt-3">
                <div class="card">
                    <div class="card-header">
                        <center>
                            <h5 class="card-title mb-0">Edit <strong>Prospek</strong></h5>
                        </center>
                    </div>
                    <div class="list-group list-group-flush" role="tablist">
                        <a class="btn btn-success" href="{{ url('prospek') }}">Back</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-xl-10 mt-3">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">
                        <div class="card">
                            <form action="{{ url('prospek/'.$prospek->id_profile) }}" method="POST" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="card-header">
                                    <h4><strong> Prospek Profile </strong></h4>
                                </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="form-label"><b>Nama Prospek</b></label>
                                                    <input type="text" name="nama_profile" class="form-control" placeholder="Nama Lengkap" value="{{ $prospek->nama_profile }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label"><b>Nomor Handphone</b></label>
                                                    <input type="number" name="nohp_profile" class="form-control" placeholder="Nomor Telepon" value="{{ $prospek->nohp_profile }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label"><b>Alamat Profile</b></label>
                                                    <textarea name="alamat_profile" class="form-control @error('alamat_profile') is-invalid @enderror" placeholder="Alamat Prospek" value="{{ old('alamat_profile') }}" cols="30" rows="5">{{ $prospek->alamat_profile }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label"><b>Longtitude</b></label>
                                                    <input type="text" name="longtitude" class="form-control" placeholder="Longtitude" value="{{ $prospek->longtitude }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label"><b>Latitude</b></label>
                                                    <input type="text" name="latitude" class="form-control" placeholder="Latitude" value="{{ $prospek->latitude }}" readonly>
                                                </div>
                                            </div>
                                                <div class="col-md-4">
                                                    <div class="text-center">
                                                        <img src="images/{{ $prospek->foto }}" class="rounded-circle img-responsive mt-2" width="128" height="128" />
                                                        <div class="mt-2">
                                                            <input type="file" name="foto">
                                                        </div>
                                                        <small>For best results, use an image at least 5MB</small>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h4><strong>Prospek Interview</strong></h4>
                                    </div>
                                    <div class=card-body>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Metode Pembelian</label>
                                            <select class="form-control @error('metode_pembelian') is-invalid @enderror" id="exampleFormControlSelect1" name="metode_pembelian">
                                                <option value="{{ $prospek->metode_pembelian }}">{{ $prospek->metode_pembelian }}</option>
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
                                                <option value="{{ $prospek->kepemilikan_rumah }}">{{ $prospek->kepemilikan_rumah }}</option>
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
                                                <option value="{{ $prospek->akses_kendaraan }}">{{ $prospek->akses_kendaraan }}</option>
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
                                            <input type="date" min="<?= date('Y-m-d'); ?>" name="tanggal_pengiriman" class="form-control @error('tanggal_pengiriman') is-invalid @enderror" placeholder="Tanggal Pengiriman" value="{{ $prospek->tanggal_pengiriman }}">
                                            @error('tanggal_pengiriman')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Ketersediaan Dana</label>
                                            <select class="form-control @error('ketersediaan_dana') is-invalid @enderror" id="exampleFormControlSelect1" name="ketersediaan_dana">
                                                <option value="{{ $prospek->ketersediaan_dana }}">{{ $prospek->ketersediaan_dana }}</option>
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
                                                <option value="{{ $prospek->booking_fee }}">{{ $prospek->booking_fee }}</option>
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
                                                <option value="{{ $prospek->merk }}">{{ $prospek->merk }}</option>
                                                @foreach ($produk as $item)
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
                                                <option value="{{ $prospek->tipe }}">{{ $prospek->tipe }}</option>
                                                @foreach ($produk as $item)
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
                                                <option value="{{ $prospek->down_payment }}">{{ $prospek->down_payment }}</option>
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
                                                <option value="{{ $prospek->tipe_asuransi }}">{{ $prospek->tipe_asuransi }}</option>
                                                <option value="kombinasi">Kombinasi</option>
                                                <option value="all risk">All Risk</option>
                                                <option value="TLO">TLO</option>
                                            </select>
                                            @error('tipe_asuransi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Discount <span style="color: red">(Masukkan tanpa '%')</span></label>
                                            <input type="text" name="diskon" class="form-control @error('diskon') is-invalid @enderror" placeholder="Discount" value="{{ $prospek->diskon }}">
                                            @error('diskon')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Sudah Ada Penawaran Lain</label>
                                            <select class="form-control @error('penawaran_lain') is-invalid @enderror" id="exampleFormControlSelect1" name="penawaran_lain">
                                                <option value="{{ $prospek->penawaran_lain }}">{{ $prospek->penawaran_lain }}</option>
                                                <option value="ya">Sudah</option>
                                                <option value="tidak">Belum</option>
                                            </select>
                                            @error('penawaran_lain')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Leasing lain (untuk metode kredit)</label>
                                            <input type="text" name="leasing" class="form-control" placeholder="Masukkan jika pernah memiliki kredit di leasing lain" value="{{ $prospek->leasing }}">
                                            @error('leasing')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label"><b>Kunjungan Selanjutnya</b></label>
                                            <input type="date" min="<?= date('Y-m-d'); ?>" name="kunjungan_selanjutnya" class="form-control @error('kunjungan_selanjutnya') is-invalid @enderror" placeholder="Kunjungan Selanjutnya" value="{{ $prospek->kunjungan_selanjutnya }}">
                                            @error('kunjungan_selanjutnya')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection