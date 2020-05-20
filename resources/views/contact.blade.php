@extends('layouts.frontMaster')

@section('title', 'Contact Us')
@section('keywords', 'Contact Us')
@section('description', 'Contact Us')

@section('content')

<div class="container mb-5">
    <img src="{{ url('assets/images/contact.jpg') }}" alt="Contact Image" class="w-100">
</div>
<!-- Contact us  -->
<div class="container">
    <div class="row mb-4">
        <div class="col-md-2"></div>
        <div class="col-md-8 mb-3">
            <h2 class="mb-2">Get in touch with Me</h2>
            <p>Pellentesque sagittis nibh venenatis sapieni congue consectetur. Integer nulla nunc, efficitur sit
                amet sagittis sed, suscipit et magna. Nulla porttitor neque non dapibus nec elit tristique sagittis.
            </p>
            <p class="lead">
                <a href="mailto:{{ setting('email') }}" class="__cf_email__">
                    <i class="fas fa-envelope mr-1"></i>
                    {{ setting('email') }}
                </a>
            </p>
            <form id="contact-form" data-toggle="validator" method="post" action="" novalidate="true">
                <div class="row mb-0">
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                            <input id="form_name" type="text" name="name" class="form-control" placeholder="Name" required="required" data-error="Your Name is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Email" required="required" data-error="Valid email is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="form-group mb-0">
                            <textarea id="form_message" name="message" class="form-control" placeholder="Comment" rows="7" required="required" data-error="Please,leave us a message."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xs-12 align-left">
                        <button type="submit" class="btn btn-primary rounded-1 btn-shadow">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

@endsection