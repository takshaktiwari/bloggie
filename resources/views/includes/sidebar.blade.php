<div class="widget">
    <form method="GET" action="{{ url('posts') }}" role="search" class="search-form dark-outline-form">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-btn">
                <button class="btn" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </form>
</div>
<div class="bg-color-grayflame widget p-4">

    <h5 class="widget-title">Categories</h5>
    <ul class="category-list list-unstyled mb-0">
        @foreach(get_categories() as $category)
        <li>
            <a href="{{ url('posts?category='.$category->slug) }}">
                {{ $category->category }}
            </a>
        </li>
        @endforeach
    </ul>
</div>
<div class="widget bg-color-grayflame p-4">
    <h5 class="widget-title">Top Posts</h5>
    <ul class="list-unstyled post-simple-list mb-0">
        @foreach(posts_featured(9) as $key => $post)
            <li class="media">
                <span class="reveal-title mr-3">{{ $key+1 }}</span>
                <div class="media-body">
                    <a href="{{ url('post/'.$post->slug) }}" class="media-title">
                        {{ $post->title }}
                    </a>
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
                </div>
            </li>
        @endforeach
    </ul>
</div>
