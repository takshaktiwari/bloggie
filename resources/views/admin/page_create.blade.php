@extends('layouts.adminMaster')

@section('content')
<style>
    .tox-notifications-container{
        display: none;
    }
</style>
<div class="pd-30">
    <h4 class="tx-gray-800 mg-b-5">
        Add New Page
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
    <form action="{{ url('admin/page/create') }}" method="POST" class="bg-white p-4 border shadow-sm" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Page Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" id="post_title" required="" value="{{ old('title') }}">
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="">Featured Image</label>
                    <input type="file" name="ft_image" class="form-control" id="post_title" >
                </div>
            </div>
            <div class="col-md-4">
                <label for="">Status <span class="text-danger">*</span></label>
                <select name="status" class="form-control" required="">
                    <option value="1" {{ selected(old('1'), '1') }} >Active</option>
                    <option value="0" {{ selected(old('0'), '0') }} >In-Active</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <textarea name="content" rows="5" class="form-control text-editor">{{ old('content') }}</textarea>
        </div>
        <div class="form-group">
            <label for="">Meta Title</label>
            <textarea name="m_title" rows="2" class="form-control meta_field" placeholder="Write Meta Title of product" maxlength="250">{{ old('m_title') }}</textarea>
        </div>
        <div class="form-group">
            <label for="">Meta Keywords </label>
            <textarea name="m_keywords" rows="2" class="form-control meta_field" placeholder="Enter Meta keywords" maxlength="250">{{ old('m_keywords') }}</textarea>
        </div>
        <div class="form-group">
            <label for="">Meta Description </label>
            <textarea name="m_description" rows="2" class="form-control meta_field" placeholder="Enter Meta description" maxlength="250">{{ old('m_description') }}</textarea>
        </div>
        <input type="submit" class="btn btn-dark px-5">
    </form>
</div><!-- br-pagebody -->

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '.text-editor',
        plugins : 'advlist link image lists table  imagetools insertdatetime hr fullpage fullscreen emoticons',
        menubar: 'edit insert format tools table help',
        toolbar1: 'fontselect fontsizeselect formatselect | table link image rotateleft rotateright emoticons | insertdatetime  fullscreen ',
        toolbar2: 'undo redo | bold italic strikethrough subscript superscript underline blockquote hr | bullist numlist | aligncenter alignjustify alignleft alignnone alignright | backcolor forecolor | indent outdent ',
        contextmenu: false,
        height: 300,
        icons: 'material',
        mobile: {
            height: 500,
        }
        
    });

    $(document).ready(function($) {
        $("#post_title").keyup(function(event) {
            var post_title = $(this).val();
            $(".meta_field").val(post_title);
        });
    });
</script>
@endsection
