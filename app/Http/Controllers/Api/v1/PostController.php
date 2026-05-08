<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [
            [
                "id" => 1,
                "Title" => "Test",
                "Body" => "Post Body",
            ]
        ];

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'Title' => 'required|string|min:2',
            'Body' => ['required', 'string', 'min:2']
        ]); 

        $data['author_id'] = 1;
        $post = Posts::create($data);

        return response()->json($post, 201);
        
        // ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'message'=>"Test",
            'data' => [
                "id" => 1,
                "Title" => "Test",
                "Body" => "Post Body",
            ]
        ])->header('Test', 'zura');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'Title' => 'required|string|min:2',
            'Body' => ['required', 'string', 'min:2']
        ]);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->noContent();
    }
}
