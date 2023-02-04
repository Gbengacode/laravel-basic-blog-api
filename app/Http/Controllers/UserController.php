<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
       $user =  User::query()->get();
       return new JsonResponse([
         "data" => $user
       ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
  
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
    {
      $user =  User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ], 200);
       return new JsonResponse([
        "success" => true,
        "data" => $user
       ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        if(empty($user)) {
            return new JsonResponse([
                "status" => false,
                "msg" => 'Not found'
            ], 404);
        }
        return new JsonResponse([
            "data" => $user
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
   
     * @param  \App\Models\User  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
          $update = $user->update([
            "name" => $request->name ?? $user->name,
            "password" => $request->password ?? $user->password
          ]);

         if(!$update) {
              return new JsonResponse([
                "success" => false
              ]);
         } 
         return new JsonResponse([
              "success" => true
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      $delete = $user->forceDelete();
      if(!$delete){
         return new JsonResponse([
             "success" => false 
         ], 500);
      }

      return new JsonResponse([
        "success" => true
      ], 200);
       
    }
}
