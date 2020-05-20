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
    <div class="row" id="add_block">
        <div class="col-md-8">
            <form action="{{ url('admin/category/create') }}" method="POST" enctype="multipart/form-data" class="bg-white p-sm-5 p-4 shadow-sm mb-5">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ url('storage'.$category->image_sm) }}" alt="" style="max-height: 80px;">
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="">Select Image </label>
                            <input type="file" name="image_file" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="">Category </label>
                    <input type="text" name="category" id="category" required="" class="form-control" placeholder="Category name" value="{{ $category->category }}">
                </div>

                <div class="form-group">
                    <label for="">Parent Category </label>
                    <select name="parent" class="form-control" >
                        <option value="">-- Select --</option>
                        @foreach($categories as $parent)
                            @php
                                $selected = '';
                                if(isset($category->parent_category->id)){
                                    $selected = selected($category->parent_category->id, $parent->id);
                                }
                            @endphp
                            <option value="{{ $parent->id }}" {{ $selected }}>
                                {{ $parent->category }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Featured <span class="text-danger">*</span></label>
                            <select name="featured" class="form-control" required>
                                <option value="0" {{ selected($category->featured, '0') }} >No</option>
                                <option value="1" {{ selected($category->featured, '1') }} >Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-control" required>
                                <option value="1" {{ selected($category->status, '1') }} >Active</option>
                                <option value="0" {{ selected($category->status, '0') }} >In-Active</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Meta title <span class="text-danger">*</span></label>
                    <textarea name="m_title" rows="2" class="form-control meta_field" required="" maxlength="250">{{ $category->m_title }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Meta Keywords <span class="text-danger">*</span></label>
                    <textarea name="m_keywords" rows="2" class="form-control meta_field" required="" maxlength="250">{{ $category->m_keywords }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Meta Description <span class="text-danger">*</span></label>
                    <textarea name="m_description" rows="2" class="form-control meta_field" required="" maxlength="250">{{ $category->m_description }}</textarea>
                </div>
                <input type="hidden" name="category_id" value="{{ $category->id }}">
                <input type="submit" class="btn btn-dark px-4">
            </form>
        </div>
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
