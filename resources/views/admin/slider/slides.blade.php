@extends('layouts.adminMaster')

@section('content')

<div class="pd-30">
    <h4 class="tx-gray-800 mg-b-5">
        Slider

        <a href="{{ url('admin/slide/create') }}" class="btn btn-info btn-sm px-3">Add slide</a>
    </h4>
</div><!-- d-flex -->

@include('includes.errors')


    <div class="br-pagebody mg-t-5 pd-x-30">
		<div class="bg-white">
			<table id="datatable" class="table table-bordered">
			    <thead>
				    <tr>
				        <th>#</th>
				        <th>Image</th>
				        <th>Title</th>
				        <th>Action</th>
				    </tr>
			    </thead>


			    <tbody>
				    @foreach($slides as $key => $slide)
				        <tr>
				        	<td>{{ $key+1 }}</td>
				        	<td>
				        		<img src="{{ url('storage'.$slide->image_sm) }}" alt="" style="max-height: 100px;">
				        	</td>
				            <td>
				                {{ $slide->title }}
				                <div class="small">{{ $slide->caption }}</div>
				                <div class="text-secondary mt-1">
				                	<b class="mr-2">Status:</b> 
				                	@if($slide->status == '0')
				                		In-Active
				                	@elseif($slide->status == '1')
				                		Active
				                	@endif

				                	<br>
				                	<b class="mr-2">Set Order:</b> {{ $slide->set_order }}
				                </div>
				            </td>
				            <td class="font-size-20">
			                    <a href="{{ url('admin/slide/edit/'.$slide->id) }}" class="btn btn-sm btn-success" title="Edit this">
			                        <i class="fas fa-edit"></i>
			                    </a>
								
			                    <a href="{{ url('admin/slide/delete/'.$slide->id) }}" class="btn btn-sm btn-danger" title="Delete this" onclick="return confirm('Are you sure to delete ?')">
			                        <i class="fas fa-trash"></i>
			                    </a>
				            </td>
				        </tr>
				    @endforeach
			    </tbody>
			</table>
		</div>
    </div> <!-- container-fluid -->
@endsection
