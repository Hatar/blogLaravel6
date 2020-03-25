<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Profile;
use App\Tag;
class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index',[
            'posts'=>Post::all(),
            'categories'=>Category::all(),
            'profiles'=>Profile::all(),
            'tags'=>Tag::all()
        ]);
    }
}
