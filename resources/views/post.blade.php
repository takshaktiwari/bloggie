@extends('layouts.frontMaster')

@section('title', $post->title)
@section('keywords', $post->title)
@section('description', $post->title)

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="post_img mb-0">
                <img src="{{ url('storage'.$post->image_lg) }}" alt="{{ $post->title }}" class="w-100">
            </div>
        </div>
    </div>
</div>
<div class="container mb-65px mt-sm-5 mt-3">
    <div class="row">
        <div class="col-md-8">
            <div class="blog_posts stander_blog_single_post mb-5">
                <article>
                    <div class="post_text p-sm-4 p-3">
                        <div class="post_meta_top">
                            <span class="post_meta_category">
                                @if(isset($post->category->category))
                                    <a href="{{ url('posts?category='.$post->category->slug) }}" title="Browse posts">
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
                        <h2 class="post_title mb-20px">
                            {{ $post->title }}
                        </h2>
                        <div class="post_content">
                            {!! $post->content !!}
                        </div>
                        <div class="post_meta_bottom mt-40px mb-30px">
                            <div class="text-lg-left">
                                <ul class="blog-post-tags mb-25px">
                                    <li>
                                        <a href="#" rel="tag">Creative</a>
                                    </li>
                                    <li>
                                        <a href="#" rel="tag">Design</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="separator-line mb-25px"></div>
                            <div class="navigation post-navigation">
                                <div class="row align-items-center nav-links">
                                    <div class="col-lg-6 text-lg-left">
                                    	@isset($prev->title)
                                        <div class="nav-previous mb-15px">
                                            <div class="nav-subtitle"> Previous Post </div>
                                            <div class="nav-title">
                                                <a href="{{ url('post/'.$prev->slug) }}" title="Previous post">
                                                	<i class="fas fa-long-arrow-alt-left fa-lg mr-1"
                                                        aria-hidden="true"></i>
                                                    {{ $prev->title }}
                                                </a>
                                            </div>
                                        </div>
                                        @endisset
                                    </div>
                                    <div class="col-lg-6 text-lg-right">
                                    	@isset($next->title)
                                        <div class="nav-next mb-15px">
                                            <div class="nav-subtitle">Next Post</div>
                                            <div class="nav-title">
                                            	<a href="{{ url('post/'.$next->slug) }}" title="Next Post">
                                            		{{ $next->title }}
                                                    <i class="fas fa-long-arrow-alt-right fa-lg ml-1"
                                                        aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                            <div class="separator-line mt-10px"></div>
                        </div>
                        <div class="blog-post-comments mt-4">
                            <div class="comments-area mb-45px">
                                @foreach($comments as $comment)
                                    <div class="comment-list mb-4" id="comment_{{ $comment->id }}">
                                        <div class="comment-meta d-flex">
                                            <div class="">
                                                <img class="avatar" src="{{ url('assets/images/user-icons/user-200.png') }}" alt="img" width="75" height="75">
                                            </div>
                                            <div class="pl-3">
                                                <cite>
                                                    <a href="javascript:void(0)" title="User name">{{ $comment->usr_name }}</a>
                                                </cite>
                                                <div>
                                                    <span class="text-danger">
                                                        {{ date('F d, Y', strtotime($comment->created_at)) }} at {{ date('h:i a', strtotime($comment->created_at)) }} - 
                                                    </span>
                                                    <a class="comment-reply-link comment_reply" href="javascript:void(0)" aria-label="Reply to A WordPress Commenter" title="Reply to this comment" data-comment="{{ $comment->id }}" data-name="{{ $comment->usr_name }}">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="comment-content comment comment-body">
                                            {{ $comment->usr_comment }}
                                        </p>
                                    </div>
                                    @if(count($comment->replies) > '0')
                                        <div class="reply_box ml-4 pl-3">
                                        @foreach($comment->replies as $reply)
                                            <div class="comment-list mb-4" id="comment_{{ $reply->id }}">
                                                <div class="comment-meta d-flex">
                                                    <div class="">
                                                        <img class="avatar" src="{{ url('assets/images/user-icons/user-200.png') }}" alt="img" width="55" height="55">
                                                    </div>
                                                    <div class="pl-3">
                                                        <cite>
                                                            <a href="javascript:void(0)" title="User name">{{ $reply->usr_name }}</a>
                                                        </cite>
                                                        <div>
                                                            <span class="text-danger">
                                                                {{ date('F d, Y', strtotime($reply->created_at)) }} at {{ date('h:i a', strtotime($reply->created_at)) }} - 
                                                            </span>
                                                            <a class="comment-reply-link comment_reply" href="javascript:void(0)" aria-label="Reply to A WordPress Commenter" title="Reply to this comment" data-comment="{{ $comment->id }}" data-name="{{ $reply->usr_name }}">Reply</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="comment-content comment comment-body">
                                                    <span class="reply_name">{{ $reply->re_usr_name }}</span>
                                                    {{ $reply->usr_comment }}
                                                </p>
                                            </div>
                                        @endforeach
                                        </div>
                                    @endif
                                    <hr>
                                @endforeach
                            </div>
                            <h5 class="comment-reply-title mb-4" id="comment_title">Leave a comment</h5>

                            <form method="POST" action="{{ url('comment') }}" class="form-fields-bg-gray pb-3" >
                                @csrf
                            	<div class="row mb-10px">
                            	    <div class="form-group col-md-6">
                            	        <input name="name" type="text" class="form-control h-100 py-2" placeholder="Name" value="{{ old('name') }}">
                            	    </div>
                            	    <div class="form-group col-md-6">
                            	        <input name="email" type="email" class="form-control h-100 py-2" placeholder="Email" value="{{ old('email') }}">
                            	    </div>
                            	</div>
                                <div class="form-group mb-20px">
                                    <div class="alert alert-info mb-0 py-1" id="re_title" style="display: none;">
                                        Reply to <b id="re_name"></b>
                                        <a href="javascript:void(0)" class="float-right p-0 m-0 close_reply" style="font-size: 20px;">
                                            <i class="fas fa-times-circle"></i>
                                        </a>
                                    </div>

                                    <textarea rows="8" id="comment_area" name="comment" class="form-control h-100 py-2" placeholder="Comment" maxlength="500">{{ old('comment') }}</textarea>
                                </div>
                                
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <input type="hidden" name="re_comment_id" id="re_comment_id" value="{{ old('re_comment_id') }}">
                                <input type="hidden" name="re_usr_name" id="re_usr_name" value="{{ old('re_usr_name') }}">
                                <button type="submit" class="btn btn-primary btn-shadow rounded-1">Submit</button>
                            </form>

                        </div>
                    </div>
                </article>

            </div>
        </div>
        <div class="col-md-4">
        	@include('includes/sidebar')
        </div>
    </div>
</div>

	@include('includes/latest-posts')
	@include('includes/subscribe')

    @section('scripts')
        @parent
        <script>
            $(document).ready(function($) {
                $(".comment_reply").click(function(event) {
                    var re_comment_id = $(this).attr('data-comment');
                    var usr_name = $(this).attr('data-name');

                    $("#re_comment_id").val(re_comment_id);
                    $("#re_usr_name").val(usr_name);
                    $("#re_title").slideDown('fast');
                    $("#re_name").html(usr_name);
                    $('html, body').animate({
                        scrollTop: $("#comment_title").offset().top
                    }, 1000);
                });

                $(".close_reply").click(function(event) {
                    $("#re_comment_id").val('');
                    $("#re_title").slideUp('fast');
                    $("#re_name").html('');
                });
            });
        </script>
    @endsection
@endsection

