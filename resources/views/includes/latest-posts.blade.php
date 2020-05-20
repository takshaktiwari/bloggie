<div class="container mb-4 mt-0 mt-sm-5">
    <div class="row">
        <div class="col-12">
            <h4 class="mb-4">Newly Added Posts </h4>
        </div>
    </div>
    <div class="row blog_posts cardPostStyle">
    	@foreach(posts_latest(6) as $post)
	        <div class="col-md-4 col-sm-6">
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
	                                <a href="{{ url('posts?category='.$post->category->slug) }}">
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
    </div>
</div>