<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Auth;
use Validator;



class commentController extends Controller
{
    public function getComments($post_id) {
        // Retrieve comments for the specific post
        $comments = Comment::with('user') // Load user data for each comment
            ->where('post_id', $post_id) // Filter by the post ID
            ->get();
    
        // Check if comments were found
        if ($comments->isEmpty()) {
            return response()->json([
                'message' => 'No comments found for this post.'
            ], 404);
        }
    
        return response()->json($comments);
    }
    public function createComment(Request $request ,$post_id){

       
        $validate = Validator::make($request->all(),[
            "image" => 'nullable|mimes:png,webp,jpg|max:900',
            "comment_content"=>'string|required'
        ]);
        $user = Auth::User();
       
        if(!$validate->fails()){
            $comment = new comment();
            $comment->user_id = $user->id;
            $comment->post_id = $request->post_id;
            $comment->image = $request->image;
            $comment->comment_content = $request->comment_content;
            $comment->save();
            return response()->json([
                "message"=>"comment Created",
                "comment_content" =>$request->comment_content,
                "post"=>$request->post_id,
            ]);
        }
        else{
            return response()->json([
                "message"=>"Post Not Created"
            ]);
        }

    }
}
