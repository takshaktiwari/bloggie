<?php

namespace App\Http\Controllers;

use Image;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settings()
    {
    	return view('admin/settings');
    }

    public function logo_update(Request $request)
    {
    	$data = $request->all();

    	$object = ['site_name_lg'	=>	$data['site_name_lg'],
    				'site_name_md'	=>	$data['site_name_md'],
    				'site_name_sm'	=>	$data['site_name_sm'],
    				'tag_line'		=>	$data['tag_line'],
    				'email'			=>	$data['email'],
    				'email_2'		=>	$data['email_2'],
    				'phone'			=>	$data['phone'],
    				'phone_2'		=>	$data['phone_2'],
    				'whatsapp_no'	=>	$data['whatsapp_no'],
    				'facebook_page'	=>	$data['facebook_page'],
    				'instagram_page'=>	$data['instagram_page'],
    				'twitter_page'	=>	$data['twitter_page'],
    				'pinterest_page'=>	$data['pinterest_page'],
    				'reddit_page'	=>	$data['reddit_page'],
    				'youtube_page'	=>	$data['youtube_page'],
    				];

    	if ($_FILES['site_logo']['name'] != '') {
			$ext = $request->site_logo->extension();

			$logo_lg = '/app/settings/logo_lg.'.$ext;
		    $img = Image::make($_FILES['site_logo']['tmp_name']);
		    $img->save(storage_path().$logo_lg, 80, $ext);
		    $object = array_merge($object, ['logo_lg'	=>	$logo_lg]);

		    $logo_500 = '/app/settings/logo_500.'.$ext;
		    $img = Image::make($_FILES['site_logo']['tmp_name']);
		    $img->resize(500, null, function ($constraint) { 
		        $constraint->aspectRatio();
		    });
		    $img->save(storage_path().$logo_500, 80, $ext);
		    $object = array_merge($object, ['logo_500'	=>	$logo_500]);

		    $logo_400 = '/app/settings/logo_400.'.$ext;
		    $img = Image::make($_FILES['site_logo']['tmp_name']);
		    $img->resize(500, null, function ($constraint) { 
		        $constraint->aspectRatio();
		    });
		    $img->save(storage_path().$logo_400, 80, $ext);
		    $object = array_merge($object, ['logo_400'	=>	$logo_400]);

		    $logo_300 = '/app/settings/logo_300.'.$ext;
		    $img = Image::make($_FILES['site_logo']['tmp_name']);
		    $img->resize(500, null, function ($constraint) { 
		        $constraint->aspectRatio();
		    });
		    $img->save(storage_path().$logo_300, 80, $ext);
		    $object = array_merge($object, ['logo_300'	=>	$logo_300]);

		    $logo_200 = '/app/settings/logo_200.'.$ext;
		    $img = Image::make($_FILES['site_logo']['tmp_name']);
		    $img->resize(500, null, function ($constraint) { 
		        $constraint->aspectRatio();
		    });
		    $img->save(storage_path().$logo_200, 80, $ext);
		    $object = array_merge($object, ['logo_200'	=>	$logo_200]);

		    $logo_100 = '/app/settings/logo_100.'.$ext;
		    $img = Image::make($_FILES['site_logo']['tmp_name']);
		    $img->resize(500, null, function ($constraint) { 
		        $constraint->aspectRatio();
		    });
		    $img->save(storage_path().$logo_100, 80, $ext);
		    $object = array_merge($object, ['logo_100'	=>	$logo_100]);

		    $logo_50 = '/app/settings/logo_50.'.$ext;
		    $img = Image::make($_FILES['site_logo']['tmp_name']);
		    $img->resize(500, null, function ($constraint) { 
		        $constraint->aspectRatio();
		    });
		    $img->save(storage_path().$logo_50, 80, $ext);
		    $object = array_merge($object, ['logo_50'	=>	$logo_50]);
	    }

	    if ($_FILES['favicon']['name'] != '') {
	    	$ext = $request->favicon->extension();
		    $favicon = '/app/settings/favicon.'.$ext;
		    $img = Image::make($_FILES['favicon']['tmp_name']);
		    $img->resize(50, null, function ($constraint) { 
		        $constraint->aspectRatio();
		    });
		    $img->save(storage_path().$favicon, 80, $ext);
		    $object = array_merge($object, ['favicon'	=>	$favicon]);
	    }

	    foreach ($object as $key => $value) {
	    	Setting::where('option', $key)->update(['option_value'	=>	$value]);
	    }

	    cache()->forget('settings');
	    
	    return redirect()->back()
	    				->withErrors('UPDATED !! Settings are successfully updated');
    }
}
