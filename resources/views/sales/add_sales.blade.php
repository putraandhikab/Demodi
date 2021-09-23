@extends('utama')
@section('content')

<div class="col-12 mt-3 ml-2">
    <a href="{{ url('sales') }}" class="btn btn-success">
        Back
    </a>
    
    <div class="row mt-4">
        <div class="col-auto d-none d-sm-block">
            <h2> Tambah Data <strong>Sales</strong></h2>
        </div>
    </div>

    <div class="col-12 mt-3">
        <div class="card">
            <form action="{{ url('sales') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label"><b>Nama Lengkap</b><span style="color: red">*</span></label>
                        <input type="text" name="nama_sales" class="form-control @error('nama_sales') is-invalid @enderror" placeholder="Nama Lengkap" value="{{ old('nama_sales') }}">
                        @error('nama_sales')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Username</b><span style="color: red">*</span></label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}">
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Password</b><span style="color: red">*(Min 6 karakter)</span></label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Konfirmasi Password</b><span style="color: red">*</span></label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Password">
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Nomor Handphone</b><span style="color: red">*</span></label>
                        <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Nomor Telepon" value="{{ old('no_hp') }}">
                        @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Alamat</b><span style="color: red">*</span></label>
                        <textarea name="alamat_sales" class="form-control @error('alamat_sales') is-invalid @enderror" placeholder="Alamat Lengkap" value="{{ old('alamat_sales') }}" cols="30" rows="5">{{ old('alamat_sales') }}</textarea>
                        @error('alamat_sales')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Email</b><span style="color: red">*</span></label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Alamat Email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Bank</b><span style="color: red">*</span></label>
                        <select  name="bank" class="form-control @error('bank') is-invalid @enderror" placeholder="Nama Bank" value="{{ old('bank') }}">
                        <option value="">--Pilih--</option>
                        <option>BNI</option>
                        <option>BCA</option>
                        <option>BCA SYARIAH</option>
                        <option>BTN</option>
                        <option>BTPN</option>
                        <option>CITI BANK</option>
                        <option>CIMB NIAGA</option>
                        <option>CIMB NIAGA SYARIAH</option>
                        <option>DANAMON</option>
                        <option>MANDIRI</option>
                        <option>MEGA</option>
                        <option>MUAMALAT</option>
                        </select>
                        @error('bank')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Nomor Rekening</b><span style="color: red">*</span></label>
                        <input type="number" name="norek" class="form-control @error('norek') is-invalid @enderror" placeholder="Nomor Rekening" value="{{ old('norek') }}">
                        @error('norek')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Pendapatan</b><span style="color: red">*</span></label>
                        <input type="number" name="pendapatan" class="form-control @error('pendapatan') is-invalid @enderror" placeholder="Pendapatan" value="{{ old('pendapatan') }}">
                        @error('pendapatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label w-100"><b>Upload Foto Sales</b><span style="color: red">*(Max size 5 Mb)</span></label>
                        <input type="file" name="foto">
                    </div>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection