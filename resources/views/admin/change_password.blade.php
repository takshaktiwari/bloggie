@extends('layouts.adminMaster')

@section('content')

<div class="pd-30">
    <h4 class="tx-gray-800 mg-b-5">
        Change Password
    </h4>
</div><!-- d-flex -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li class="font-weight-bold">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="br-pagebody mg-t-5 pd-x-30">
    <div class="row">
        <div class="col-md-7">
            <form action="{{ url('admin/change_password') }}" method="POST" class="bg-white p-sm-5 p-4 shadow-sm mb-5">
                @csrf
                <div class="form-group">
                    <label for="">Old Password <span class="text-danger">*</span></label>
                    <input type="password" name="old_pwd" class="form-control" required="" placeholder="Enter old password">
                </div>
                <div class="form-group">
                    <label for="">New Password <span class="text-danger">*</span></label>
                    <input type="text" name="new_pwd" class="form-control" required="" placeholder="Enter new password">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" name="new_pwd_confirmation" class="form-control" required="" placeholder="Confirm new password">
                </div>
                <input type="submit" class="btn btn-dark px-4">
            </form>
        </div>
    </div>
    

</div><!-- br-pagebody -->


@endsection
