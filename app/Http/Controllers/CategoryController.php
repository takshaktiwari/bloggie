<?php

namespace App\Http\Controllers;

use Image;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function categories()
	{
		$categories = Category::with('parent_category')
								->orderBy('category', 'ASC')
								->get()->all();
		return view('admin/categories')->with('categories', $categories);
	}

    public function create(Request $request)
    {
    	$data = $request->all();

    	if (!isset($data['category_id'])) {
    		$request->validate([
    			'category'	=>	'required|unique:categories,category'
    		]);
    	}
    	

    	$slug = str_replace(' ', '-', strtolower(trim($data['category'])));
    	$slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);

    	$object = [	'category'		=>	$data['category'],
    				'slug'			=>	$slug,
    				'parent'		=>	$data['parent'],
    				'm_title'		=>	$data['m_title'],
    				'm_keywords'	=>	$data['m_keywords'],
    				'm_description'	=>	$data['m_description'],
    				'featured'		=>	$data['featured'],
    				'status'		=>	$data['status'],
    			];

    	if ($_FILES['image_file']['tmp_name'] != '') {
			$image_lg = '/app/category/'.$slug.'.jpg';
		    $img = Image::make($_FILES['image_file']['tmp_name']);
		    $img->resize(1000, null, function ($constraint) { 
		        $constraint->aspectRatio();
		    });
		    $img->save(storage_path().$image_lg, 80, 'jpg');

	    	$image_md = '/app/category/md/'.$slug.'.jpg';
	        $img = Image::make($_FILES['image_file']['tmp_name']);
	        $img->resize(500, null, function ($constraint) { 
	            $constraint->aspectRatio();
	        });
	        $img->save(storage_path().$image_md, 80, 'jpg');

	        $image_sm = '/app/category/sm/'.$slug.'.jpg';
		    $img = Image::make($_FILES['image_file']['tmp_name']);
		    $img->resize(200, null, function ($constraint) { 
		        $constraint->aspectRatio();
		    });
		    $img->save(storage_path().$image_sm, 80, 'jpg');

		    $arr = ['image_lg'	=>	$image_lg,
					'image_md'	=>	$image_md,
					'image_sm'	=>	$image_sm];
			$object = array_merge($object, $arr);
    	}

    	if (isset($data['category_id'])) {
    		Category::where('id', $data['category_id'])->update($object);
    		$msg = 'SUCCESS !! Category is successfully updated';
    	}else{
    		Category::create($object);
    		$msg = 'SUCCESS !! Category is successfully updated';
    	}

    	return redirect('admin/categories')->withErrors($msg);
    }

    public function edit($id)
    {
    	$category = Category::with('parent_category')->find($id);
    	$categories = Category::orderBy('category', 'ASC')
    							->get()->all();
    	return view('admin/category_edit')->with('category', $category)
    									->with('categories', $categories);
    }


}
