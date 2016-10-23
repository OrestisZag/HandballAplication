<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class CategoriesController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $categories = Category::where(function ($query) use ($request) {
            if ($term = $request->get('term')) {
                $query->orwhere('name', 'like', '%' .$term. '%');
            }
        })->orderBy('id')->paginate(10);

        return view('category.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:2|max:40'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        Session::flash('success', 'New Category Created');

        return redirect()->route('category.index');
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
        $category = Category::find($id);
        return view('category.edit')->withCategory($category);
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
        $this->validate($request,[
            'name' => 'required|min:2|max:40'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        Session::flash('success', 'Category Updated');

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
