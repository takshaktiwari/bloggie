@extends('layouts.adminMaster')


@section('content')

    <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">
            Edit Slider

            <a href="{{ url('admin/slider') }}" class="btn btn-info btn-sm px-3">All Slides</a>
        </h4>
    </div><!-- d-flex -->

    @include('includes.errors')

    <div class="br-pagebody mg-t-5 pd-x-30">
		<div class="row">
			<div class="col-md-7">
                <div class="bg-white">
                    <form action="{{ url('admin/slide/update') }}" method="POST" enctype="multipart/form-data" class="p-sm-3 p-0">
                        @csrf
                        <div class="d-flex">
                            <img src="{{ url('storage'.$slide->image_sm) }}" alt="" class="img-thumbnail" style="max-height: 70px;">
                            <div class="form-group ml-3">
                                <label for="">Select Image <span class="text-danger">*</span></label>
                                <input type="file" name="slide" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Title </label>
                            <input type="text" name="title" class="form-control" maxlength="250" value="{{ $slide->title }}">
                        </div>
                        <div class="form-group">
                            <label for="">Caption </label>
                            <textarea name="caption" rows="3" class="form-control" maxlength="250">{{ $slide->caption }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Set Order </label>
                                    <input type="number" name="set_order" class="form-control" value="{{ $slide->set_order }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" required class="form-control">
                                        <option value="1" {{ selected($slide->status, '1') }} >Active</option>
                                        <option value="0" {{ selected($slide->status, '0') }} >In-Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">URL Link </label>
                            <input type="text" name="url_link" class="form-control" placeholder="https://webpage.con/page-url" value="{{ $slide->url_link }}">
                        </div>
                        <div class="form-group">
                            <label for="">URL Text </label>
                            <input type="text" name="url_text" class="form-control" placeholder="Click Here" value="{{ $slide->url_text }}" >
                        </div>
                        <input type="hidden" name="slide_id" value="{{ $slide->id }}">
                        <input type="submit" class="btn btn-primary px-5">
                    </form>
                </div>
			</div>
		</div>

    </div> <!-- container-fluid -->
@endsection