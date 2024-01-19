<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    //Guardar el like en la base de datos con la relación muchos a uno del Post
    public function store(Post $post){
        /* $post->likes()->create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id
        ]);

        return back(); */
    }


    public function destroy(Request $request, Post $post){
        /* $request->user()->likes()->where('post_id', $post->id)->delete();

        return back(); */
    }
}
