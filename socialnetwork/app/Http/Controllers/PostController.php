<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;

class PostController extends Controller
{

	public function getDashboard()
	{

		$posts = Post::orderBy('created_at', 'desc')->get();

		return view('dashboard', ['posts' => $posts]);
	}

    public function  postCreatePost(Request $r)
    {
    	$validator = Validator::make(
    		[
				'body' => $r->body,
			],
			[
    		'body' => 'required|max:1000'
			]);

    	$post = new Post();
    	$post->body = $r->body;
    	$post->user_id = Session::get('user')->id;
    	$message = 'The post is empty!';
		if ($post->save()){
			$message = 'Post successfuly created!';
		}

		if ($validator->fails()) 
		{
			 return redirect('/dashboard')
		                        ->withErrors($validator)
		                        ->withInput();
		} 
		else 
		{
    	return Redirect::to("dashboard")->with(['message' => $message]);
    	}
    }

    public function getDeletePost($post_id)
    {
    	$post = Post::where('id', $post_id)->first();
    	// if (Session::user()->id != $post->user_id)
    	$post->delete();
    	return Redirect::to("dashboard")->with(['message' => 'Successfully deleted!']);
    }

    public function postEditPost(Request $r)
    {
    	$validator = Validator::make(
    		[
				'body' => $r->body,
			],
			[
    		'body' => 'required|max:1000'
			]);
    	if ($validator->fails()) 
		{
			 return Redirect::to("dashboard")->with(['message' => 'Edit your post or delete it!']);
		} else{
			$post = Post::find($r['postId']);
			$post['body'] = $r['body'];
			$post->update();
    	return response()->json(['new-body' => $post['body']], 200);
		}
    }

    public function postLikePost(Request $r)
    {
    	$post_id = $r->post_id;
    	$is_like = $r->islike ==='true';
    	$update = false;
    	$post = Post::find($post_id);
    	if(!$post){
    		return null; 
    	}
    	$user = Session::get('user');
    	$like = $user->likes()->where('post_id', $post_id)->first();
    	if($like){
    		$already_like = $like->like;
    		$update = true;
    		if($already_like == $is_like){
    			 $like->delete();
    			 return null;
    			}
    		} else{
    			$like = new Like();
    		}
    		$like->like = $is_like;
    		$like->user_id = $user_id;
    		$like->post_id = $post_id;
    		if($update){
    			$like->update();
    		} else{
    			$like->save();
    		}
    		return null;
    	
    }
}
