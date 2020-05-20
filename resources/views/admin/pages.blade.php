@extends('layouts.adminMaster')

@section('content')

<div class="pd-30">
    <h4 class="tx-gray-800 mg-b-5">
        All Content Pages

        <a href="{{url('admin/page/create')}}" class="btn btn-info btn-sm px-3 ">Add Page</a>
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
    <div class="table-wrapper bg-white py-2 rounded-sm">
        <table id="datatable1" class="table display responsive nowrap datatable">
            <thead>
                <tr>
                    <th>Feat. Image</th>
                    <th>Page Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>
                            <img src="{{ url('storage/'.$page->ft_image_sm) }}" style="height: 80px;" alt="">
                        </td>
                        <td>
                            <div class="mb-1">{{ $page->title }}</div>
                            @if($page->status == '1')
                                <span class="font-weight-bold text-success">Active</span>
                            @else
                                <span class="text-danger">In-Active</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('admin/page/edit/'.$page->id) }}" class="btn btn-sm btn-dark">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ url('admin/page/delete/'.$page->id) }}" class="btn btn-sm btn-danger">
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
