@extends('layouts.adminMaster')

@section('content')

<div class="pd-30">
    <h4 class="tx-gray-800 mg-b-5">
        Users
    </h4>
</div><!-- d-flex -->

@include('includes/errors');

<div class="br-pagebody mg-t-5 pd-x-30">
    
    <div class="table-wrapper bg-white py-2 rounded-sm">
        <table id="datatable1" class="table display responsive nowrap datatable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Verified</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->verified }}</td>
                        <td>
                            @if($user->status == '1')
                                <a href="{{ url('admin/user/status_update/0/'.$user->id) }}" class="font-weight-bold text-success">
                                    Active
                                </a>
                            @else
                                <a href="{{ url('admin/user/status_update/1/'.$user->id) }}" class="text-danger">
                                    In-Active
                                </a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('admin/user/delete/'.$user->id) }}" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div><!-- br-pagebody -->

<script>
    $(document).ready(function($) {
        $(".datatable").DataTable();
    });
</script>
@endsection
