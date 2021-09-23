@extends('utama')
@section('content')

<div class="col-12 mt-3 ml-2">
    <a href="{{ url('jadwals') }}" class="btn btn-success">
        Back
    </a>

    <div class="row mt-4">
        <div class="col-auto d-none d-sm-block">
            <h2> Tambah Data <strong>Jadwal</strong></h2>
        </div>
    </div>
    
    <div class="col-12 mt-3">
        <div class="card">
            <form action="{{ url('jadwals') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label"><b>Nama Sales</b><span style="color: red">*</span></label>
                        <select name="nama_sales" class="form-control">
                            <option value="id_sales">- Pilih -</option>
                            @foreach ($sales as $s)
                            
                            <option value="{{ $s->id_sales }}">{{ $s->nama_sales }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Nama Prospek</b><span style="color: red">*</span></label>
                        <select name="nama_prospek" class="form-control">
                            <option value="id_profile">- Pilih -</option>
                            @foreach ($prospek_profiles as $p)
                            
                            <option value="{{ $p->id_profile }}">{{ $p->nama_profile }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label"><b>Tanggal Kunjungan</b><span style="color: red">*</span></label>
                        <input type="date" min="<?= date('Y-m-d'); ?>" name="tanggal_kunjungan" class="form-control" placeholder="tanggal_kunjungan" required>
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