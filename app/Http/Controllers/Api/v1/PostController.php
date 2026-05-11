<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated(); 

        $data['author_id'] = 1;
        $post = Post::create($data);

        return response()->json($post, 201);
        
        // ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        return response()->json($post);


        // ->header('Test', 'zura');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request)
    {
        $data = $request->validated();

        $post->update($data);
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        $post->delete();
        return response()->noContent();
    }
}
