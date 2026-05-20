<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = request()->user();
        $posts = $user->Posts()->paginate();
        return PostResource::collection($posts);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated(); 

        $data['author_id'] = $request->user()->id;
        $post = Post::create($data);

        return response()->json(new PostResource($post), 201);
        
        // ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        abort_if(Auth::id() != $post->author_id, 403, 'Access Forbidden');
        
        return response()->json(new PostResource($post));


        // ->header('Test', 'zura');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, post $post)
    {
        abort_if(Auth::id() != $post->author_id, 403, 'Access Forbidden');
        $data = $request->validated();
        $post->update($data);
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        abort_if(Auth::id() != $post->author_id, 403, 'Access Forbidden');

        $post->delete();
        return response()->noContent();
    }
}
