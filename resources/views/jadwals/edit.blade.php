@extends('utama')
@section('content')
<div class="col-12 mt-3 ml-2">
    <a href="{{ url('jadwals') }}" class="btn btn-success">
        Back
    </a>

    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 style="color: #495057"><b>Edit Data Jadwal</b></h3>
            </div>
            <form action="{{ url('jadwals/'.$jadwals->id_jadwal) }}" method="post">
                @method('patch')
                @csrf
                <div class="card-body">
                        <div class="form-group">
                            <label class="form-label"><b>Nama Sales</b></label>
                            <select name="id_sales" class="form-control">
                                <option value="{{ $jadwal->Sales['id_sales'] }}">{{ $jadwal->Sales['nama_sales'] }}</option>
                                @foreach ($sales as $s)
                                    <option value="{{ $s->id_sales }}">{{ $s->nama_sales }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><b>Nama Prospek</b></label>
                            <select name="id_profile" class="form-control">
                                <option value="{{ $jadwal->Prospek_profile['id_profile'] }}">{{ $jadwal->Prospek_profile['nama_profile'] }}</option>
                                @foreach ($prospek_profiles as $p)
                                    <option value="{{ $p->id_profile }}">{{ $p->nama_profile }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><b>Tanggal Kunjungan</b></label>
                            <input type="date" min="<?= date('Y-m-d'); ?>" name="tanggal_kunjungan" class="form-control" placeholder="tanggal_kunjungan" value="{{ $jadwals->tanggal_kunjungan }}" required>
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