<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   	public function index()
   	{

   		$slider = \App\Slider::where('status', '1')
                           ->orderBy('set_order', 'ASC')
                           ->get()->all();

   		$post_latest = \App\Post::where('status', '1')
   								->limit(8)
   								->get()->all();						

   		return view('homepage')->with('slider', $slider)
   								->with('post_latest', $post_latest);
   	}

   	public function contact()
   	{
   		return view('contact');
   	}


}
