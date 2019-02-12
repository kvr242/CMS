<?php namespace App\Http\Controllers;

/**
 * Class PostController
 *
 * @author Varun Reddy varun.reddy@goftx.com
 * @package App\Http\Controllers
 */

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();

        return view('pages.addNewPost')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'postTitle'     => 'required|min:3|max:200',
            'postCategory'  => 'required',
            'postContent'   => 'required'
        ]);

        $post           = new Post();
        $post->title    = $request->postTitle;
        $post->author   = "Varun";
        $post->category = $request->postCategory;
        $post->image    = $request->postContent;

        $post->save();
        session()->flash('Success', 'Post Added Successfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */

    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        //
    }
}