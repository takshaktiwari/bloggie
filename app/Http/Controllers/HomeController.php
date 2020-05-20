<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   	public function index()
   	{
   		$post_single = \App\Post::where('status', '1')->first();

   		$post_featured = \App\Post::where('status', '1')
   								->where('featured', '1')
   								->limit(3)
   								->get()->all();

   		$post_latest = \App\Post::where('status', '1')
   								->limit(8)
   								->get()->all();						

   		return view('homepage')->with('post_single', $post_single)
   								->with('post_featured', $post_featured)
   								->with('post_latest', $post_latest);
   	}

   	public function contact()
   	{
   		return view('contact');
   	}


}
