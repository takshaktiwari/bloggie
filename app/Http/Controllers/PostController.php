<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\Comment;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function browse_posts(Request $request)
    {
        $data = $request->all();
        $title = 'Blog';
        $query = Post::where('status', '1');

        if (isset($data['category'])) {
            $category   = Category::where('slug', $data['category'])
                                    ->with('child_categories')
                                    ->first();
            $title      = $category->category;

            $category_ids = array();
            array_push($category_ids, $category->id);
            foreach ($category->child_categories as $category) {
                array_push($category_ids, $category->id);
            }

            $query->whereIn('category_id', $category_ids);
        }

        if (isset($data['search'])) {
            $search = $data['search'];
            $title  = $search;
            $query->where(function($query) use($search){
                $query->where('title', 'like', '%'.trim($search).'%');
                $query->orWhere('content', 'like', '%'.trim($search).'%');
                $query->orWhere('search_tags', 'like', '%'.trim($search).'%');
            });
        }

        $posts = $query->paginate(12);

        return view('posts')->with('posts', $posts)
                            ->with('title', $title);
    }

    public function post_single($slug)
    {
        $post = Post::where('slug', $slug)
                        ->where('status', '1')
                        ->first();
        $comments = Comment::with('replies')
                            ->where('post_id', $post->id)
                            ->whereNull('re_comment_id')
                            ->get()->all();

        $next = Post::where('id', '>', $post->id)->where('status', '1')->first();
        $prev = Post::where('id', '<', $post->id)->where('status', '1')->first();
        return view('post')->with('post', $post)
                            ->with('next', $next)
                            ->with('prev', $prev)
                            ->with('comments', $comments);
    }


    #   for admin purpose
    public function posts()
    {
    	$posts = Post::orderBy('id', 'DESC')
                        ->get()->all();

    	return view('admin/posts')->with('posts', $posts);
    }

    public function create()
    {
    	$categories = Category::orderBy('category', 'ASC')->get()->all();
    	return view('admin/post_create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         =>  'required|max:255',
            'content'       =>  'required',
            'search_tags'   =>  'required|max:500',
        ]);

        $status         = false;
        $featured       = false;
        $commentable    = false;

        $slug = str_replace(' ', '-', strtolower(trim($request->input('title'))));
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);

        if ($request->input('status')) {
            $status     = $request->input('status');
        }
        if ($request->input('featured')) {
            $featured   = $request->input('featured');
        }
        if ($request->input('commentable')) {
            $commentable= $request->input('commentable');
        }

        $object = ['title'          =>  $request->input('title'),
                    'content'       =>  $request->input('content'),
                    'slug'          =>  $slug,
                    'status'        =>  $status,
                    'featured'      =>  $featured,
                    'commentable'   =>  $commentable,
                    'search_tags'   =>  $request->input('search_tags'),
                    'm_title'       =>  $request->input('m_title'),
                    'm_keywords'    =>  $request->input('m_keywords'),
                    'm_description' =>  $request->input('m_description'),
                    'created_by'    =>  Auth::user()->id,
                ];

        if ($_FILES['featured_img']['name'] != '') {
            $image_lg = '/app/posts/'.$slug.'.jpg';
            $img = \Image::make($_FILES['featured_img']['tmp_name']);
            $img->resize(1000, null, function ($constraint) { 
                $constraint->aspectRatio();
            });
            $img->save(storage_path().$image_lg, 80, 'jpg');

            $image_md = '/app/posts/md/'.$slug.'.jpg';
            $img = \Image::make($_FILES['featured_img']['tmp_name']);
            $img->resize(500, null, function ($constraint) { 
                $constraint->aspectRatio();
            });
            $img->save(storage_path().$image_md, 80, 'jpg');

            $image_sm = '/app/posts/sm/'.$slug.'.jpg';
            $img = \Image::make($_FILES['featured_img']['tmp_name']);
            $img->resize(200, null, function ($constraint) { 
                $constraint->aspectRatio();
            });
            $img->save(storage_path().$image_sm, 80, 'jpg');

            $arr = ['image_lg'  =>  $image_lg,
                    'image_md'  =>  $image_md,
                    'image_sm'  =>  $image_sm];
            $object = array_merge($object, $arr);
        }

        $post = Post::create($object);
        $post->categories()->sync($request->input('categories'));

        return redirect('admin/posts')->withErrors('CREATED !! Post is successfully created');
    }

    public function edit($id)
    {
        $post = Post::find($id);

        $categories = Category::orderBy('category', 'ASC')->get()->all();
        return view('admin/post_edit')->with('post', $post)
                                    ->with('categories', $categories);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title'         =>  'required|max:255',
            'content'       =>  'required',
            'search_tags'   =>  'required|max:500',
        ]);

        $status         = false;
        $featured       = false;
        $commentable    = false;

        $slug = str_replace(' ', '-', strtolower(trim($request->input('title'))));
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);

        if ($request->input('status')) {
            $status     = $request->input('status');
        }
        if ($request->input('featured')) {
            $featured   = $request->input('featured');
        }
        if ($request->input('commentable')) {
            $commentable= $request->input('commentable');
        }

        $object = ['title'          =>  $request->input('title'),
                    'content'       =>  $request->input('content'),
                    'slug'          =>  $slug,
                    'status'        =>  $status,
                    'featured'      =>  $featured,
                    'commentable'   =>  $commentable,
                    'search_tags'   =>  $request->input('search_tags'),
                    'm_title'       =>  $request->input('m_title'),
                    'm_keywords'    =>  $request->input('m_keywords'),
                    'm_description' =>  $request->input('m_description'),
                    'created_by'    =>  Auth::user()->id,
                ];

        if ($_FILES['featured_img']['name'] != '') {
            $image_lg = '/app/posts/'.$slug.'.jpg';
            $img = \Image::make($_FILES['featured_img']['tmp_name']);
            $img->resize(1000, null, function ($constraint) { 
                $constraint->aspectRatio();
            });
            $img->save(storage_path().$image_lg, 80, 'jpg');

            $image_md = '/app/posts/md/'.$slug.'.jpg';
            $img = \Image::make($_FILES['featured_img']['tmp_name']);
            $img->resize(500, null, function ($constraint) { 
                $constraint->aspectRatio();
            });
            $img->save(storage_path().$image_md, 80, 'jpg');

            $image_sm = '/app/posts/sm/'.$slug.'.jpg';
            $img = \Image::make($_FILES['featured_img']['tmp_name']);
            $img->resize(200, null, function ($constraint) { 
                $constraint->aspectRatio();
            });
            $img->save(storage_path().$image_sm, 80, 'jpg');

            $arr = ['image_lg'  =>  $image_lg,
                    'image_md'  =>  $image_md,
                    'image_sm'  =>  $image_sm];
            $object = array_merge($object, $arr);
        }

        Post::where('id', $request->input('post_id'))->update($object);
        Post::find($request->input('post_id'))->categories()->sync($request->input('categories'));

        return redirect('admin/posts')->withErrors('UPDATED !! Post is successfully updated');
    }


}
