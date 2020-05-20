<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comments_list()
    {
        $comments = Comment::with('post')
                            ->orderBy('id', 'ASC')
                            ->get()->all();
        return view('admin/comments')->with('comments', $comments);
    }


    public function comment(Request $request)
    {
    	$data = $request->all();

    	$request->validate([
    		'name'		=>	'required|max:150',
    		'email'		=>	'required|max:150',
    		'comment'	=>	'required|max:500',
    		'post_id'	=>	'required|numeric',
    	]);

    	Comment::create([
    		'post_id'		=>	$data['post_id'],
    		'usr_name'		=>	$data['name'],
    		'usr_email'		=>	$data['email'],
    		'usr_comment'	=>	$data['comment'],
            're_usr_name'   =>  $data['re_usr_name'],
            're_comment_id' =>  $data['re_comment_id'],
    	]);

    	$msg = 'SUCCESS !! Your comment is successfully published. Thank you for your comment';
    	return redirect()->back()->withErrors($msg);
    }

    public function delete($id)
    {
        Comment::where('id', $id)->delete();
        return redirect()->back()->withErrors('DELETED !! your comment is successfully deleted');
    }


}
