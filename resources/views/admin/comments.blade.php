@extends('layouts.adminMaster')

@section('content')
<style>
    table.dataTable.nowrap th, table.dataTable.nowrap td{
        white-space: normal;
    }
</style>
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
                    <th>User</th>
                    <th>Post / Comment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>
                            {{ $comment->usr_name }}
                            <br>
                            {{ $comment->usr_email }}
                            <br>
                            @if($comment->re_comment_id != '')
                                <span class="badge badge-light text-warning">
                                    : is reply
                                </span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('post/'.$comment->post->slug) }}" class="font-weight-bold" target="_blank">
                                {{ $comment->post->title }}
                            </a>
                            <div class="small">
                                {{ $comment->usr_comment }}
                            </div>
                        </td>
                        <td>
                            <a href="{{ url('post/'.$comment->post->slug.'#comment_'.$comment->id) }}" class="btn btn-info btn-sm mb-1" target="_blank">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <a href="{{ url('admin/comment/delete/'.$comment->id) }}" class="btn btn-danger btn-sm mb-1">
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
