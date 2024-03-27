<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {

        // Obtener los ids quienes seguimos
        $ids = ( auth()->user()->followings->pluck('id')->toArray() ); //pluck: trae ciertos campos
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20); //latest(): ordena los registros por el mas actual
        // dd($posts);

        return view('home', [
            'posts' => $posts,
        ]);
    }
}
