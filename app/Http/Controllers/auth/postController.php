<?php

namespace App\Http\Controllers\auth;
use Auth;
use Validator;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function getPost() {
       
        $posts = Post::with(['user', 'comments'])->get();
    
        return response()->json($posts);
    }
    public function createPost(Request $request){

       
        $validate = Validator::make($request->all(),[
            "image" => 'nullable|mimes:png,webp,jpg|max:900',
            "post_content"=>'string|required'
        ]);
        $user = Auth::User();
       
        if(!$validate->fails()){
            $post = new Post();
            $post->user_id = $user->id;
            $post->image = $request->image;
            $post->post_content = $request->post_content;
            $post->save();
            return response()->json([
                "message"=>"Post Created",
                "post_content" =>$request->post_content,
            ]);
        }
        else{
            return response()->json([
                "message"=>"Post Not Created"
            ]);
        }

    }
}
