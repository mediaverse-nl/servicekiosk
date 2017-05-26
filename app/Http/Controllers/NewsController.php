<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    protected $blog;

    public function __construct()
    {
        $this->blog = new Blog();
    }

    public function index()
    {
        return view('news.index')->with('blog', $this->blog->get());
    }

    public function show($id)
    {
        return view('news.show')->with('blog', $this->blog->find($id)->get());
    }
}
