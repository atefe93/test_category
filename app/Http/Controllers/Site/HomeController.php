<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories=Category::where('parent_id',null)->get();
        return view('site.index', compact('categories'));
    }



    public function logout()
    {
        auth()->logout();
        return redirect()->route('site.index');
    }
}
