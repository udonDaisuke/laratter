<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 🔽 追加
use App\Models\Tweet;

class TweetLikeController extends Controller

{// 🔽 追加
    /** 
     * Store a newly created resource in storage.
    */
    public function store(Tweet $tweet)
    {
      $tweet->liked()->attach(auth()->id());
      return back();
    }
  
    /**
     * Remove the specified resource from storage.
     */
    // 🔽 追加
    public function destroy(Tweet $tweet)
    {
      $tweet->liked()->detach(auth()->id());
      return back();
    }
}
