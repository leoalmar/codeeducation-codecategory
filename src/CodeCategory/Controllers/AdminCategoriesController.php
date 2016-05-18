<?php

namespace Leoalmar\CodeCategory\Controllers;


use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Leoalmar\CodeCategory\Models\Category;

class AdminCategoriesController extends Controller
{

    private $category;

    /**
     * @var ResponseFactory
     */
    private $response;

    /**
     * @param Category $category
     */
    public function __construct(ResponseFactory $response, Category $category)
    {
        $this->category = $category;
        $this->response = $response;
    }

    public function index()
    {
        $categories = $this->category->all();

        return $this->response->view('codecategory::index', compact('categories'));
    }

    public function create()
    {
        $categories = $this->category->all()->lists('name','id')->toArray();

        return $this->response->view('codecategory::create', compact('categories'));
    }

    public function store(Request $request)
    {

        $this->category->create($request->all());

        return redirect()->route('admin.categories.index');
    }

}