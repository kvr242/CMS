<?php namespace App\Http\Controllers;

/**
 * Class CategoryController
 *
 * @author Varun Reddy varun.reddy@goftx.com
 * @package App\Http\Controllers
 */

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('pages.category')->with('categories', $categories);
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
        //Initialize The Category
        $category = new Category();
        $category->name = $request->categoryName;
        $category->author = "Varun";
        $category->save();
        //Success Saved Successfully
       $request-> session()->flash('Success', 'Added Successfully!');
        return redirect()->back();

    }

    /**
     * @param $id
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

    public function removeCategory(Request $request)
    {
        $id         = $request->input('id');
        $category   = Category::findOrFail($id);

        $category->delete();

        return redirect('/category');
    }

    public function editCategory(Request $request)
    {
        $id         = $request->input('categoryID');
        $editedText = $request->input('editedText');

        Category::where('id', $id)->update(array('name' => $editedText));

        return redirect('/category');
    }
}