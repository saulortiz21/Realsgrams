<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Request $request,Post $post)
    {
        $post->likes()->create([
            'user_id' => $request->user()->id
            
            ]);
        return back();
    }

    public function destroy(Request $request,Post $post)
    {
        $post->likes()->where('user_id', $request->user()->id)->delete();
        return back();
    }
}
