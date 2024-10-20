<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Traits\ApiResponse;
use App\Traits\ApiResponseTrait;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use ApiResponse;
    public function index(){
        $posts = Post::all();
        // return response()->json(PostResource::collection($posts),200);
        return $this->successResponse(PostResource::collection($posts),"Posts returned successfully");
    }

    public function store(PostRequest $request){

        $post = Post::create($request->all());
        if (!$post) {
            return response()->json("error",403);
        }
        return response()->json(["post"=> new PostResource($post) , 'message' => "success"],201);



    }
}
