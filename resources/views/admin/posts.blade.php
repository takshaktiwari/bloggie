@extends('layouts.adminMaster')

@section('content')
<style>
    table.dataTable.nowrap th, table.dataTable.nowrap td{
        white-space: normal;
    }
</style>
<div class="pd-30">
    <h4 class="tx-gray-800 mg-b-5">
        All Posts

        <a href="{{url('admin/post/create')}}" class="btn btn-info btn-sm px-3 ">Add Post</a>
    </h4>
</div><!-- d-flex -->

@include('includes/errors')

<div class="br-pagebody mg-t-5 pd-x-30">
    <div class="table-wrapper bg-white py-2 rounded-sm">
        <table id="datatable1" class="table display responsive nowrap datatable">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th style="min-width: 80px;">Status / Feat.</th>
                    <th style="min-width: 120px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <img src="{{ url('storage'.$post->image_sm) }}" alt="" style="height: 50px;">
                        </td>
                        <td>
                            <div class="text-dark">
                                {{ $post->title }}
                            </div>
                            
                            @if(isset($post->categories))
                                @foreach($post->categories as $category)
                                    <span class="badge badge-success">
                                        {{ $category->category }}
                                    </span>
                                @endforeach
                            @else
                                <span class="text-secondary ">
                                    Un-categorized
                                </span>
                            @endif
                        </td>
                        <td>
                            @if($post->status == '0')
                                <div class="text-secondary">In-Active</div>
                            @else
                                <div class="text-success font-weight-bold">
                                    Active
                                </div>
                            @endif

                            @if($post->featured == '0')
                                <div class="text-secondary">Not Featured</div>
                            @else
                                <div class="text-info font-weight-bold">
                                    Featured
                                </div>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('/') }}" class="btn btn-info btn-sm">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <a href="{{ url('admin/post/edit/'.$post->id) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ url('admin/post/delete/'.$post->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">
                                <i class="fas fa-trash"></i>
                            </a>
                            <div class="text-danger small">
                                {{ date('d-M-Y h:i A', strtotime($post->created_at)) }}
                            </div>
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
