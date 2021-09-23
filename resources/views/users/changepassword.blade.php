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
                        <a class="btn btn-secondary" href="{{ url('users'.Auth::user()->id) }}">Change Profile</a>
                        <a class="btn btn-success" href="{{ url('dashboard') }}">Back</a>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-xl-10 mt-3">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h4><strong>Change Password</strong></h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="form-label"><b>Current Password</b></label>
                                                <input type="password" name="currentpassword" class="form-control" value="" placeholder="Current Password" autofocus required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label"><b>New Password</b></label>
                                                <input type="password" name="newpassword" class="form-control" value="" placeholder="New Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label"><b>Confirm Password</b></label>
                                                <input type="password" name="confirmpassword" class="form-control" value="" placeholder="Confirm Password" required>
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