<?php

namespace Leoalmar\CodeCategory\Controllers;


use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Leoalmar\CodeCategory\Models\Category;
use Leoalmar\CodeCategory\Tests\Models\CategoryTest;

class AdminCategoriesController extends Controller
{

    /**
     * @var ResponseFactory
     */
    private $response;

    /**
     * @var Category
     */
    private $category;

    /**
     * AdminCategoriesController constructor.
     * @param ResponseFactory $response
     * @param Category $category
     */
    public function __construct(ResponseFactory $response, Category $category)
    {
        $this->response = $response;
        $this->category = $category;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->all();
        return $this->response->view('codecategory::index', compact('categories'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->all()->lists('name','id')->toArray();
        return $this->response->view('codecategory::create', compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->category->create($request->all());
        return redirect()->route('admin.categories.index');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $category = $this->category->find($id);
        $categories = $this->category->all()->lists('name','id')->toArray();

        return $this->response->view('codecategory::edit', compact('category','categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['active'] = isset($data['active']);
        $this->category->find($id)->update($data);
        return redirect()->route('admin.categories.index');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $this->category->destroy($id);
        return redirect()->route('admin.categories.index');
    }
    
}