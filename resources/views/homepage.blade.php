@extends('layouts.frontMaster')

@section('title', 'Home')
@section('keywords', 'Home')
@section('description', 'Home')

@section('styles')
	@parent
	<link rel="stylesheet" href="{{ url('assets/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ url('assets/css/owl.theme.default.css') }}">
	<style>
		.home-slider .slide{
			background-size: cover;
			background-position: center;
			border-radius: 6px;
			color: white;
			text-shadow: 0px 0px 2px black;
		}
	</style>
@endsection

@section('content')

	<!-- Slider -->
	<div class="container mb-5">
	    <div class="owl-carousel home-slider">
	    	@foreach($slider as $slide)
	    	<div class="slide py-5 px-sm-5 px-3" style="background-image: url({{ url('storage'.$slide->image_lg) }})">
	    		<div class="row">
	    			<div class="col-md-7 py-sm-5 py-4">
	    				<h1 class="text-white">{{ $slide->title }}</h1>
	    				<p class="text-white">{{ $slide->caption }}</p>
	    			</div>
	    		</div>
	    	</div>
	    	@endforeach
	    </div>
	</div>

	<div class="container mb-4">
	    <div class="row">
	        <!-- Blog -->
	        <div class="col-lg-8">
	            <div class="row blog_posts cardPostStyle">
	            	@foreach($post_latest as $post)
		                <div class="col-md-6 col-lg-6">
		                    <article>
		                        <div class="post_img">
		                            <a href="{{ url('post/'.$post->slug) }}" title="View Post">
		                            	<img src="{{ url('storage'.$post->image_md) }}" alt="Card image cap">
		                            </a>
		                        </div>
		                        <div class="post_text">
		                            <div class="post_meta_top">
		                                <span class="post_meta_category">
	                                    	@if(isset($post->categories))
	                                    	    @foreach($post->categories as $category)
	                                    	        <a href="{{ url('post?category='.$category->slug) }}">
	                                    	            {{ $category->category }}
	                                    	        </a>
	                                    	    @endforeach
	                                    	@else
	                                    	    <a href="javascript:void(0)">
	                                    	        Un-Categorized
	                                    	    </a>
	                                    	@endif
		                                </span>
		                                <span class="post_meta_date">
		                                	{{ date('M d, Y', strtotime($post->created_at)) }}
		                                </span>
		                            </div>
		                            <h5 class="post_title">
		                                <a href="{{ url('post/'.$post->slug) }}" title="View Post">
		                                	{{ $post->title }}
		                                </a>
		                            </h5>
		                            <div class="post_content">
		                                <p>
		                                	{{ substr(strip_tags($post->content), 0, 150) }}
		                                </p>
		                            </div>
		                        </div>
		                    </article>
		                </div>
	                @endforeach
	            </div>

	            <div class="text-center">
	            	<a href="{{ url('posts') }}" class="btn btn-primary rounded-1 btn-shadow" title="Browse Posts">
	            		See More Posts
	            	</a>
	            </div>
	        </div>
	        <!-- Widgets -->
	        <div class="col-lg-4 mt-5 mt-sm-0">
	            @include('includes/sidebar')
	        </div>
	    </div>
	</div>

	
	@include('includes/latest-posts')
	@include('includes/subscribe')

@endsection

@section('scripts')
	@parent
	<script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
	<script>
		$('.owl-carousel').owlCarousel({
			autoplay: true,
		    loop:true,
		    margin:10,
		    nav:true,
		    dots: true,
		    items: 1,
		})
	</script>
@endsection