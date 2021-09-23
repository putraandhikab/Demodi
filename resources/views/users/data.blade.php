@extends('utama')
@section('content')
<div class="col-12 mt-3 ml-2">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h2> Halaman <strong>Admin</strong></h2>
        </div>
    </div>

        <div class="card mt-3 table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ $item -> firstname}}</td>
                        <td>{{ $item -> lastname}}</td>
                        <td>{{ $item -> username}}</td>
                        <td>{{ $item -> email}}</td>
                        <td>{{ $item -> phonenumber}}</td>
                        <td>{{ $item -> address}}</td>
                        <td class="table-action">
                            <button class="btn btn-link btn-sm">
                                <a href="{{ url('users'.$item->id) }}">
                                    <i class="align-middle" data-feather="edit-2"></i>
                                </a>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection