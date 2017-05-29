<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    protected $blog;

    public function __construct()
    {
        $this->blog = new Blog();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blog.index')->with('blog', $this->blog->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'titel' => 'required',
            'tekst' => 'required|min:10'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()
                ->route('admin.blog.create')
                ->withErrors($validator)
                ->withInput();
        }

        $blog = $this->blog;
        $blog->titel = $request->titel;
        $blog->tekst = $request->tekst;
        $blog->user_id = Auth::user()->id;
        $blog->save();

        \Session::flash('succes_message','Nieuws bericht opgeslagen');

        return redirect()->route('admin.blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.blog.update')
            ->with('blog', $this->blog->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'titel' => 'required',
            'tekst' => 'required|min:10'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()
                ->route('admin.blog.create')
                ->withErrors($validator)
                ->withInput();
        }

        $blog = $this->blog->find($id);
        $blog->titel = $request->titel;
        $blog->tekst = $request->tekst;
        $blog->user_id = Auth::user()->id;
        $blog->save();

        \Session::flash('succes_message','Nieuws bericht opgeslagen');

        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = $this->blog->find($id);
        $blog->delete();

        return redirect()->route('admin.blog.index');
    }
}
