<?php

namespace Leoalmar\CodeCategory\Controllers;


use Illuminate\Http\Request;
use Leoalmar\CodeCategory\Models\Category;

class AdminCategoriesController extends Controller
{

    private $category;

    /**
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->all();

        return view('codecategory::index', compact('categories'));
    }

    public function create()
    {
        $categories = $this->category->all()->lists('name','id')->toArray();

        return view('codecategory::create', compact('categories'));
    }

    public function store(Request $request)
    {

        $this->category->create($request->all());

        return redirect()->route('admin.categories.index');
    }

}