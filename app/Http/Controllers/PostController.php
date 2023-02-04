<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
  
           $post = Post::query()->get();
           return new JsonResponse([
               'data' => $post
           ]);
    }

 
      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */

    public function store(Request $request)
    {  
        
          $post = Post::query()->create([
             'title' => $request->title,
             'body' => $request->body
          ]);
          return new JsonResponse([
            'data' => $post
          ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Post $post)
    {
        //  $post = Post::query()->where('id', '=', 1)->get();
        return new JsonResponse([
             "data" => $post
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
      $update =  $post->update([
             'title' => $request->title ?? $post->id,
             'body' => $request->body ?? $post->body
        ]);

      if($update) {
         return new JsonResponse([
           "success" => true,
           "data" => $post
         ], 200);
      }  else {
           return new JsonResponse([
             "success" => false,
           ]);
      }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
       $deleted =  $post->forceDelete();
        if(!$deleted){
            return new JsonResponse([
                "success" => false,
                "msg" => "could not deleted"
            ], 500);
          return new JsonResponse([
            "success" => true
          ], 200);
        }
    }
}
