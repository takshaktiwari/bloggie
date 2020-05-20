@extends('layouts.frontMaster')

@section('title', 'Home')
@section('keywords', 'Home')
@section('description', 'Home')

@section('content')

	<!-- Slider -->
	<div class="container mb-5">
	    <div class="zero-one-carousel-container">
            <div class="bg-image">
                <a href="{{ url('post/'.$post_single->slug) }}">
                	<img src="{{ url('storage'.$post_single->image_lg) }}" alt="Picture" class="mb-0">
                </a>
            </div>
	        <ul class="zero-one-carousel-nav">
	        	@foreach($post_featured as $key => $post)
		            <li>
		                <h4 class="carousel-nav-title">
		                	<a href="{{ url('post/'.$post->slug) }}">
		                		{{ $post->title }}
		                	</a>
		                </h4>
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
		            </li>
	            @endforeach
	        </ul>
	    </div>
	    <div class="bg-white text-center py-4">
	    	<a href="{{ url('post/'.$post_single->slug) }}">
	    		<h4 class="mt-0 mb-2">{{ $post_single->title }}</h4>
	    	</a>
    		<div>
    			@if(isset($post_single->categories))
                    @foreach($post->categories as $category)
                        <a href="{{ url('post?category='.$category->slug) }}">
                            {{ $category->category }}
                        </a>
                    @endforeach
                @else
                    <a href="javascript:void(0)" class="mr-2">
                        Un-Categorized
                    </a>
                @endif
    			{{ date('M d, Y', strtotime($post_single->created_at)) }}
    		</div>
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