@extends('layouts.adminMaster')

@section('content')

<div class="pd-30">
    <h4 class="tx-gray-800 mg-b-5">
        General Setting
    </h4>
</div><!-- d-flex -->

@include('includes/errors')

<div class="br-pagebody mg-t-5 pd-x-30">
    <form action="{{ url('admin/setting/update/logo') }}" method="POST" class="" enctype="multipart/form-data">
        @csrf
        <div class="bg-white p-sm-5 p-3 shadow-sm mb-4">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="">
                            <i class="fas fa-image text-dark mr-1"></i>
                            Site Logo 
                        </label>
                        <input type="file" name="site_logo" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">
                            <i class="fas fa-image text-dark mr-1"></i>
                            Favicon 
                        </label>
                        <input type="file" name="favicon"  class="form-control">
                    </div>
                </div>
            </div>
            <div class="d-sm-flex d-block">
                <div class="float-left mr-2">
                    <img src="{{ url('storage'.setting('logo_lg')) }}" alt="" class="float-left" style="max-height: 80px;">
                    <div class="clearfix"></div>
                    <code>logo_lg</code>
                </div>
                <div class="float-left mr-2">
                    <img src="{{ url('storage'.setting('logo_500')) }}" alt="" class="float-left" style="max-height: 80px;">
                    <div class="clearfix"></div>
                    <code>logo_500</code>
                </div>
                <div class="float-left mr-2">
                    <img src="{{ url('storage'.setting('logo_400')) }}" alt="" class="float-left" style="max-height: 80px;">
                    <div class="clearfix"></div>
                    <code>logo_400</code>
                </div>
                <div class="float-left mr-2">
                    <img src="{{ url('storage'.setting('logo_300')) }}" alt="" class="float-left" style="max-height: 80px;">
                    <div class="clearfix"></div>
                    <code>logo_300</code>
                </div>
                <div class="float-left mr-2">
                    <img src="{{ url('storage'.setting('logo_200')) }}" alt="" class="float-left" style="max-height: 80px;">
                    <div class="clearfix"></div>
                    <code>logo_200</code>
                </div>
                <div class="float-left mr-2">
                    <img src="{{ url('storage'.setting('logo_100')) }}" alt="" class="float-left" style="max-height: 80px;">
                    <div class="clearfix"></div>
                    <code>logo_100</code>
                </div>
                <div class="float-left mr-2">
                    <img src="{{ url('storage'.setting('logo_50')) }}" alt="" class="float-left" style="max-height: 80px;">
                    <div class="clearfix"></div>
                    <code>logo_50</code>
                </div>
                <div class="float-left mr-2">
                    <img src="{{ url('storage'.setting('favicon')) }}" alt="" class="float-left" style="max-height: 80px;">
                    <div class="clearfix"></div>
                    <code>favicon</code>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="bg-white p-sm-5 p-3 shadow-sm mb-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">
                            <i class="text-dark fas fa-text-height mr-1"></i>
                            Site Name (Large)
                        </label>
                        <input type="text" name="site_name_lg" class="form-control" value="{{ setting('site_name_lg') }}">
                        <code>site_name_lg</code>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">
                            <i class="text-dark fas fa-text-height mr-1"></i>
                            Site Name (Medium)
                        </label>
                        <input type="text" name="site_name_md" class="form-control" value="{{ setting('site_name_md') }}">
                        <code>site_name_md</code>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">
                            <i class="text-dark fas fa-text-height mr-1"></i>
                            Site Name (Small)
                        </label>
                        <input type="text" name="site_name_sm" class="form-control" value="{{ setting('site_name_sm') }}">
                        <code>site_name_sm</code>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">
                            <i class="text-dark fas fa-text-height mr-1"></i>
                            Tag Line 
                        </label>
                        <input type="text" name="tag_line" class="form-control" value="{{ setting('tag_line') }}">
                        <code>tag_line</code>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-sm-5 p-3 shadow-sm mb-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">
                            <i class="fas fa-envelope text-dark"></i>
                            Email 
                        </label>
                        <input type="email" name="email" class="form-control" value="{{ setting('email') }}">
                        <code>email</code>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">
                            <i class="fas fa-envelope text-dark"></i>
                            Email 2
                        </label>
                        <input type="email" name="email_2" class="form-control" value="{{ setting('email_2') }}">
                        <code>email_2</code>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">
                            <i class="fas fa-phone-alt text-dark"></i>
                            Phone Number 
                        </label>
                        <input type="tel" name="phone" class="form-control" value="{{ setting('phone') }}">
                        <code>phone</code>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">
                            <i class="fas fa-phone-alt text-dark"></i>
                            Phone Number 2
                        </label>
                        <input type="tel" name="phone_2" class="form-control" value="{{ setting('phone_2') }}">
                        <code>phone_2</code>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">
                            <i class="fab fa-whatsapp text-dark"></i>
                            WhatsApp Number
                        </label>
                        <input type="tel" name="whatsapp_no" class="form-control" value="{{ setting('whatsapp_no') }}">
                        <code>whatsapp_no</code>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-sm-5 p-3 shadow-sm mb-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">
                            <i class="text-dark fab fa-facebook-f mr-1"></i>
                            Facebook Page Link 
                        </label>
                        <input type="url" name="facebook_page" class="form-control" value="{{ setting('facebook_page') }}">
                        <code>facebook_page</code>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">
                            <i class="text-dark fab fa-instagram mr-1"></i>
                            Instagram Page Link 
                        </label>
                        <input type="url" name="instagram_page" class="form-control" value="{{ setting('instagram_page') }}">
                        <code>instagram_page</code>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">
                            <i class="text-dark fab fa-twitter mr-1"></i> 
                            Twitter Page Link 
                        </label>
                        <input type="url" name="twitter_page" class="form-control" value="{{ setting('twitter_page') }}">
                        <code>twitter_page</code>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">
                            <i class="text-dark fab fa-pinterest-p mr-1"></i>
                            Pinterest Page Link 
                        </label>
                        <input type="url" name="pinterest_page" class="form-control" value="{{ setting('pinterest_page') }}">
                        <code>pinterest_page</code>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">
                            <i class="text-dark fab fa-reddit-alien mr-1"></i>
                            Reddit Page Link 
                        </label>
                        <input type="url" name="reddit_page" class="form-control" value="{{ setting('reddit_page') }}">
                        <code>reddit_page</code>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">
                            <i class="text-dark fab fa-youtube mr-1"></i>
                            Youtube Link 
                        </label>
                        <input type="url" name="youtube_page" class="form-control" value="{{ setting('youtube_page') }}">
                        <code>youtube_page</code>
                    </div>
                </div>
            </div>

            <input type="submit" class="btn btn-dark px-5">
        </div>
    </form>
</div><!-- br-pagebody -->


@endsection
