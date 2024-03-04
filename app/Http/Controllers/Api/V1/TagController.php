<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Tag;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Resources\V1\TagResource;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Resources\V1\TagCollection;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  new TagCollection(Tag::all());
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        return  new TagResource(Tag::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return new TagResource($tag);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
      return $tag->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        return $tag->delete();
    }
}
