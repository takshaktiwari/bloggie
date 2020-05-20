@extends('layouts.adminMaster')

@section('content')

<style>
    .tox-notifications-container{
        display: none;
    }
</style>
<div class="pd-30">
    <h4 class="tx-gray-800 mg-b-5">
        Create New Post
    </h4>
</div><!-- d-flex -->

@include('includes/errors')

<div class="br-pagebody mg-t-5 pd-x-30">
    <form action="{{ url('admin/post/create') }}" method="POST" class="" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="bg-white p-sm-4 p-2 shadow-sm mb-4">
                    <div class="form-group">
                        <label for="">Post title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="post_title" class="form-control rounded-0" placeholder="Enter post title" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Select Image </label>
                        <input type="file" name="featured_img" class="form-control rounded-0" placeholder="Enter post title" >
                    </div>

                    <div class="form-group">
                        <label for="">Write your post <span class="text-danger">*</span></label>
                        <textarea name="content" rows="5" class="form-control rounded-0 text-editor"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Search tags </label>
                        <textarea name="search_tags" rows="3" class="form-control" placeholder="Search Tags" maxlength="499">{{ old('search_tags') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Meta title <span class="text-danger">*</span></label>
                        <input type="text" name="m_title" class="form-control meta_field" placeholder="Enter meta title" maxlength="250" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Meta Keywords <span class="text-danger">*</span></label>
                        <textarea name="m_keywords" rows="2" class="form-control meta_field" placeholder="Enter meta keywords" maxlength="250" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Meta Description <span class="text-danger">*</span></label>
                        <textarea name="m_description" rows="2" class="form-control meta_field" placeholder="Enter meta description" maxlength="250" required=""></textarea>
                    </div>
                    
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="featured" value="1">
                            Mark as featured
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="status" value="1">
                            Publish this post (Active)
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="commentable" value="1">
                            Allow comments on this post
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-white p-sm-4 p-2 shadow-sm mb-4">
                    @foreach($categories as $category)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="categories[]" value="{{ $category->id }}">
                                {{ $category->category }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="">
            <input type="submit" class="btn btn-dark btn-lg px-5 rounded-0" value="Create Post">
            <input type="reset" class="btn btn-basic border btn-lg px-5 rounded-0" value="Reset">
        </div>
    </form>
</div><!-- br-pagebody -->

@endsection

@section('scripts')
    @parent
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '.text-editor',
            plugins : 'advlist link image lists table  imagetools insertdatetime hr fullpage fullscreen emoticons',
            menubar: 'edit insert format tools table help',
            toolbar1: 'fontselect fontsizeselect formatselect | table link image rotateleft rotateright emoticons | insertdatetime  fullscreen ',
            toolbar2: 'undo redo | bold italic strikethrough subscript superscript underline blockquote hr | bullist numlist | aligncenter alignjustify alignleft alignnone alignright | backcolor forecolor | indent outdent ',
            contextmenu: false,
            height: 500,
            icons: 'material',
            mobile: {
                height: 600,
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