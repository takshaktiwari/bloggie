@extends('layouts.frontMaster')

@section('title', $title)
@section('keywords', $title)
@section('description', $title)

@section('content')

<div class="page_main_title mb-60px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center text-lg-left">
                <h4>{{ $title }}</h4>
            </div>
            <div class="col-lg-6">
                <div class="breadcrumbs mt-10px mt-lg-0 text-center text-lg-right">
                    <span class="first-item">
                        <a href="{{ url('/') }}">HOME</a>
                    </span>
                    <span class="separator">/</span>
                    <span>
                        <a href="{{ url('posts') }}">BLOG</a>
                    </span>
                    <span class="separator">/</span>
                    <span>
                        <a href="#">{{ $title }} </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
	<div class="container mb-30px">
	    <div class="row">
	        <!-- Blog -->
	        <div class="col-lg-8">
	            <div class="row blog_posts cardPostStyle">
	            	@foreach($posts as $post)
		                <div class="col-md-6 col-lg-6">
		                    <article>
		                        <div class="post_img">
		                        	<a href="{{ url('post/'.$post->slug) }}">
		                            	<img src="{{ url('storage'.$post->image_md) }}" alt="{{ $post->title }}">
		                            </a>
		                        </div>
		                        <div class="post_text">
		                            <div class="post_meta_top">
		                                <span class="post_meta_category">
	                                    	@if(isset($post->category->category))
	                                    	    <a href="{{ url('posts?category='.$post->category->category) }}">
	                                    	        {{ $post->category->category }}
	                                    	    </a>
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
		                                <a href="{{ url('post/'.$post->slug) }}">
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

	                @if(count($posts) == '0')
	                	<div class="col-md-12">
	                	   @include('includes/not-found')
	                	</div>
	                @endif
	            </div>
	            <nav class="pagination_holder">
	            	{{ $posts->links() }}
	            </nav>
	        </div>
	        <!-- Widgets -->
	        <div class="col-lg-4 mt-30px mt-lg-0">
	            @include('includes/sidebar')
	        </div>
	    </div>
	</div>

	@include('includes/latest-posts')
	@include('includes/subscribe')

@endsection