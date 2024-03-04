<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\V1\PostResource;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\V1\PostCollection;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new PostCollection(Post::all());
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post=Post::create($request->all()) ;
        $post->tags()->syncWithoutDetaching($request['tags']);
        // $post->tags()->syncWithoutDetaching([1,2,3]);
        return  $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
         return new PostResource($post);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());
        if ($request->has('tags')) {
            $post->tags()->sync($request['tags']);
        }
        return response()->json([
            'message'=>'update successfully',
        ], 200); ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
         return  $post->delete();
    }
}
