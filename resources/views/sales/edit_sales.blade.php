@extends('utama')
@section('content')
<main class="content">

    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-3 col-xl-2 mt-3">
                <div class="card">
                    <div class="card-header">
                        <center>
                            <h5 class="card-title mb-0"><strong>Sales</strong> Data</h5>
                        </center>
                    </div>
                    <div class="list-group list-group-flush" role="tablist">
                        <a class="btn btn-success" href="{{ url('sales') }}">Back</a>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-xl-10 mt-3">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Change Sales Info</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('sales'.$sales->id_sales) }}" method="post" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="form-label"><b>Nama Lengkap</b></label>
                                                <input type="text" name="nama_sales" class="form-control @error('nama_sales') is-invalid @enderror" value="{{ $sales->nama_sales }}" placeholder="Nama Lengkap" autofocus>
                                                @error('nama_sales')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="form-label"><b>Username</b></label>
                                                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ $sales->username }}" placeholder="Username">
                                                    @error('username')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label"><b>Nomor Handphone</b></label>
                                                    <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ $sales->no_hp }}" placeholder="Nomor Telepon">
                                                </div>
                                                @error('no_hp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label"><b>Alamat Sales</b></label>
                                                <textarea name="alamat_sales" class="form-control @error('alamat_sales') is-invalid @enderror" placeholder="Alamat Lengkap" value="{{ old('alamat_sales') }}" cols="30" rows="5">{{ $sales->alamat_sales }}</textarea>
                                            </div>
                                            @error('alamat_sales')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="form-group">
                                                <label class="form-label"><b>Email</b></label>
                                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $sales->email }}" placeholder="Alamat Email">
                                            </div>
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="form-group">
                                                <label class="form-label"><b>Bank</b></label>
                                                <select name="bank" class="form-control @error('bank') is-invalid @enderror" placeholder="Nama Bank" value="{{ old('bank') }}">
                                                    <option value="{{ $sales->bank }}">{{ $sales->bank }}</option>
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
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label"><b>Nomor Rekening</b></label>
                                                    <input type="number" name="norek" class="form-control @error('norek') is-invalid @enderror" value="{{ $sales->norek }}" placeholder="Nomor Rekening">
                                            </div>
                                        </div>
                                        @error('bank_sales')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <img src="images/{{ $sales->foto }}" class="rounded-circle img-responsive mt-2" width="128" height="128" />
                                                <div class="mt-2">
                                                    <input type="file" name="foto">
                                                </div>
                                                <small>For best results, use an image at least 5MB</small>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</main>
@endsection