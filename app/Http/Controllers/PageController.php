<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function pages()
    {
    	$pages = Page::get()->all();
    	return view('admin/pages')->with('pages', $pages);
    }

    public function create()
    {
    	return view('admin/page_create');
    }

    public function store(Request $request)
    {
    	$data = $request->all();
    	$request->validate([
    		'title'			=>	'required|max:255',
    		'status'		=>	'required',
    		'content'		=>	'required',
    		'm_title'		=>	'required|max:255',
    		'm_keywords'	=>	'required|max:255',
    		'm_description'	=>	'required|max:255',
    	]);

    	$slug = str_replace(' ', '-', strtolower(trim($data['title'])));
    	$slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
    	$slug = substr($slug, 0, 50);

    	$object = [	'title'			=>	$data['title'],
    				'status'		=>	$data['status'],
    				'slug'			=>	$slug,
    				'content'		=>	$data['content'],
    				'm_title'		=>	$data['m_title'],
    				'm_keywords'	=>	$data['m_keywords'],
    				'm_description'	=>	$data['m_description'],
    			];

    	if (!empty($_FILES['ft_image']['name'])) {
			$image_lg = '/app/pages/'.$slug.'.jpg';
		    $img = \Image::make($_FILES['ft_image']['tmp_name']);
		    $img->resize(1200, null, function ($constraint) { 
		        $constraint->aspectRatio();
		    });
		    $img->save(storage_path().$image_lg, 80, 'jpg');

	    	$image_md = '/app/pages/md/'.$slug.'.jpg';
	        $img = \Image::make($_FILES['ft_image']['tmp_name']);
	        $img->resize(600, null, function ($constraint) { 
	            $constraint->aspectRatio();
	        });
	        $img->save(storage_path().$image_md, 80, 'jpg');

	        $image_sm = '/app/pages/sm/'.$slug.'.jpg';
		    $img = \Image::make($_FILES['ft_image']['tmp_name']);
		    $img->resize(300, null, function ($constraint) { 
		        $constraint->aspectRatio();
		    });
		    $img->save(storage_path().$image_sm, 80, 'jpg');

		    $arr = ['ft_image_lg'	=>	$image_lg,
					'ft_image_md'	=>	$image_md,
					'ft_image_sm'	=>	$image_sm ];
			$object = array_merge($object, $arr);
    	}

    	if (isset($data['page_id'])) {
    		Page::where('id', $data['page_id'])->update($object);
    		$msg = 'UPDATED !! Content page is successfully updated';
    	}else{
    		Page::create($object);
    		$msg = 'CREATED !! Content page is successfully created';
    	}
    	
    	return redirect('admin/pages')->withErrors($msg);
    }

    public function edit($id)
    {
    	$page = Page::find($id);
    	return view('admin/page_edit')->with('page', $page);
    }

    public function delete($id)
    {
    	Page::where('id', $id)->delete();
    	return redirect('admin/pages')->withErrors('DELETED !! Content Page is successfully deleted');
    }

}
