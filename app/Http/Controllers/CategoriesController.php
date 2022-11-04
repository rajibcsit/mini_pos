<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['main_manu']    = 'Products';
        $this->data['sub_manu']     = 'Categories';
    }
    /**
     * Display a listing of the resource.
     
     */
    public function index()
    {
        $this->data['categories'] = Category::all();

        return view('category.categories', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     
     */
    public function create()
    {
        $this->data['headline'] = 'Add New Category';
        $this->data['mode']       = 'create';
        return view('category.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     
     */
    public function store(CategoryRequest $request)
    {

        $formData = $request->all();

        if (Category::create($formData)) {
            Session::flash('message', 'Category Added Successfuly');
        }

        return redirect()->to('categories');
    }




    /**
     * Show the form for editing the specified resource.
    
     */
    public function edit($id)
    {
        $this->data['category']     = Category::findOrFail($id);
        $this->data['mode']       = 'edit';
        $this->data['headline']   = 'Update Category';

        return view('category.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {

        $category         = Category::find($id);
        $category->title  = $request->get('title');

        if ($category->save()) {
            Session::flash('message', 'Category Updated Successfuly');
        }

        return redirect()->to('categories');
    }

    /**
   
     */
    public function destroy($id)
    {
        if (Category::find($id)->delete()) {
            Session::flash('message', 'Category Deleted Successfuly');
        }

        return redirect()->to('categories');
    }
}
