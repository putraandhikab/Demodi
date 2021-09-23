@extends('utama')
@section('content')
<main class="content">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h2> Halaman <strong>Dashboard</strong></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-xxl-5 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card" style="background-color:#ffedb3">
                                <div class="card-body">
                                    <h5 class="card-title mb-4"><strong>Total Sales</strong></h5>
                                    <h1 class="display-5 mt-1 mb-3">{{ $sales }}</h1>
                                    <div class="mb-1">
                                        <a href="{{ url('sales') }}">See More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="background-color:#ffedb3">
                                <div class="card-body">
                                    <h5 class="card-title mb-4"><strong>Total Prospek</strong></h5>
                                    <h1 class="display-5 mt-1 mb-3">{{ $prospek }}</h1>
                                    <div class="mb-1">
                                        <a href="{{ url('prospek') }}">See More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card" style="background-color:#ffedb3">
                                <div class="card-body">
                                    <h5 class="card-title mb-4"><strong>Total Produk</strong></h5>
                                    <h1 class="display-5 mt-1 mb-3">{{ $produks }}</h1>
                                    <div class="mb-1">
                                        <a href="{{ url('produks') }}">See More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="background-color:#ffedb3">
                                <div class="card-body">
                                    <h5 class="card-title mb-4"><strong>Total Jadwal</strong></h5>
                                    <h1 class="display-5 mt-1 mb-3">{{ $jadwals }}</h1>
                                    <div class="mb-1">
                                        <a href="{{ url('jadwals') }}">See More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-xxl-7">
                <div class="card flex-fill" style="background-color:#ffedb3">
                    <div class="card-header" style="background-color:#fdce2d">
                        <h5 class="card-title mb-0">Calendar</h5>
                    </div>
                    <div class="card-body d-flex">
                        <div class="align-self-center w-100">
                            <div class="chart">
                                <div id="datetimepicker-dashboard"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection