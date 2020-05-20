@extends('layouts.adminMaster')

@section('content')

<div class="pd-30">
    <h4 class="tx-gray-800 mg-b-5">
        Categories

        <a href="#!" class="btn btn-info btn-sm px-3 " data-toggle="collapse" data-target="#add_block">Add Category</a>
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
    <div class="row collapse" id="add_block">
        <div class="col-md-6">
            <form action="{{ url('admin/category/create') }}" method="POST" enctype="multipart/form-data" class="bg-white p-sm-5 p-4 shadow-sm mb-5">
                @csrf
                <div class="form-group">
                    <label for="">Select Image <span class="text-danger">*</span></label>
                    <input type="file" name="image_file" required="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Category <span class="text-danger">*</span></label>
                    <input type="text" name="category" id="category" required="" class="form-control" placeholder="Category name">
                </div>

                <div class="form-group">
                    <label for="">Parent Category </label>
                    <select name="parent" class="form-control" >
                        <option value="">-- Select --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->category }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Featured <span class="text-danger">*</span></label>
                            <select name="featured" class="form-control" required>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-control" required>
                                <option value="1">Active</option>
                                <option value="0">In-Active</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Meta title <span class="text-danger">*</span></label>
                    <textarea name="m_title" rows="2" class="form-control meta_field" required="" maxlength="250"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Meta Keywords <span class="text-danger">*</span></label>
                    <textarea name="m_keywords" rows="2" class="form-control meta_field" required="" maxlength="250"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Meta Description <span class="text-danger">*</span></label>
                    <textarea name="m_description" rows="2" class="form-control meta_field" required="" maxlength="250"></textarea>
                </div>
                <input type="submit" class="btn btn-dark px-4">
            </form>
        </div>
    </div>
    
    
    <div class="table-wrapper bg-white py-2 rounded-sm">
        <table id="datatable1" class="table display responsive nowrap datatable">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Parent</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            <img src="{{ url('storage/'.$category->image_sm) }}" alt="" style="max-height: 60px;">
                        </td>
                        <td>
                            {{ $category->category }}
                            <div class="small text-danger">
                                {{ date('d-M-Y h:i A', strtotime($category->created_at)) }}
                            </div>
                        </td>
                        <td>
                            @isset($category->parent_category->category)
                                {{ $category->parent_category->category }}
                            @endisset
                        </td>
                        <td>
                            @if($category->featured == '1')
                                <span class="text-primary font-weight-bold">
                                    Featured
                                </span>
                            @else
                                <span class="text-secondary">
                                    ---
                                </span>
                            @endif
                        </td>
                        <td>
                            @if($category->status == '1')
                                <span class="text-success font-weight-bold">
                                    Active
                                </span>
                            @else
                                <span class="text-secondary">
                                    In-Active
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="tx-20">
                                <a href="{{ url('admin/category/edit/'.$category->id) }}" class="text-success mr-1" title="Edit this">
                                    <i class="fas fa-edit"></i>
                                </a>
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

        $("#category").keyup(function(event) {
            var post_title = $(this).val();
            $(".meta_field").val(post_title);
        });
    });
</script>
@endsection
