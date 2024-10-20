<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(){
        $posts = Post::get();
        if($posts->count() > 0 ){
            return PostResource::collection($posts);
        }else{
            return response()->json(['message'=> 'No record available'], 200);
        }
    }
    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'title' => 'required | string |max:225',
            'author' => 'required | string |max:225',
            'slug' => 'required',
            'body' => 'required | string',
        ]);

       if($validator->fails()){
            return response()->json([
                'message' => 'all fields are mandatory',
                'error' => $validator->messages(),
            ], 422);
       }

        $post = Post::create([
            'title' => $request->title,
            'author' => $request->author,
            'slug' => $request->slug,
            'body' => $request->body,
        ]);

        return response()->json([
            'message'=>'Post Created Succesfully',
            'data'=> new  PostResource($post)
        ],200);
    }
    public function show(Post $post){
        return new PostResource($post);
    }
    public function update(Request $request, Post $post){
        $validator = Validator::make($request->all(),[
            'title' => 'required | string |max:225',
            'author' => 'required | string |max:225',
            'slug' => 'required',
            'body' => 'required | string',
        ]);

       if($validator->fails()){
            return response()->json([
                'message' => 'all fields are mandatory',
                'error' => $validator->messages(),
            ], 422);
       }

        $post ->update([
            'title' => $request->title,
            'author' => $request->author,
            'slug' => $request->slug,
            'body' => $request->body,
        ]);

        return response()->json([
            'message'=>'Post Updated Succesfully!',
            'data'=> new  PostResource($post)
        ],200);
    }
    public function destroy(Post $post){
        $post->delete();
        return response()->json([
            'message'=>'Post Deleted Succesfully!',
        ],200);
    }
}
