@extends('utama')
@section('content')
<main class="content">

    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-md-3 col-xl-2 mt-3">

                <div class="card">
                    <div class="card-header">
                        <center>
                            <h5 class="card-title mb-0"><strong>Admin</strong> Profile</h5>
                        </center>
                    </div>

                    <div class="list-group list-group-flush" role="tablist">
                        {{-- <a class="btn btn-secondary" href="{{ url('changepassword') }}">Change Password</a> --}}
                        <a class="btn btn-success" href="{{ url('dashboard') }}">Back</a>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-xl-10 mt-3">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h4><strong>Change Profile Info</strong></h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('users/'.$users->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="form-label"><b>Username</b></label>
                                                <input type="text" name="username" class="form-control" value="{{ $users->username }}" placeholder="username"  readonly>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="form-label"><b>First Name</b></label>
                                                    <input type="text" name="firstname" class="form-control" value="{{ $users->firstname }}" placeholder="firstname" autofocus required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label"><b>Last Name</b></label>
                                                    <input type="text" name="lastname" class="form-control" value="{{ $users->lastname }}" placeholder="lastname" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label"><b>Email</b></label>
                                                    <input type="email" name="email" class="form-control" value="{{ $users->email }}" placeholder="email" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label"><b>Phone Number</b></label>
                                                    <input type="number" name="phonenumber" class="form-control" value="{{ $users->phonenumber }}" placeholder="phonenumber" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label"><b>Address</b></label>
                                                    <input type="text" name="address" class="form-control" value="{{ $users->address }}" placeholder="address" required>
                                            </div>
                                            {{-- <div class="form-group">
                                                <label class="form-label"><b>Password</b></label>
                                                    <input type="password" name="password" class="form-control" value="{{ $users->password }}" placeholder="password" required>
                                            </div> --}}
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <img src="images/{{ $users->foto }}" class="rounded-circle img-responsive mt-2" width="128" height="128" />
                                                <div class="mt-2">
                                                    <input type="file" name="foto">
                                                </div>
                                                <small>For best results, use an image at least 128px by 128px in .jpg format</small>
                                            </div>
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
    </div>
</div>
</main>
@endsection