<?php

namespace Leoalmar\CodeCategory\Controllers;


use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Leoalmar\CodeCategory\Models\Category;
use Leoalmar\CodeCategory\Repository\CategoryRepository;
use Leoalmar\CodeCategory\Repository\CategoryRepositoryInterface;
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
    private $repository;

    /**
     * AdminCategoriesController constructor.
     * @param ResponseFactory $response
     * @param Category $repository
     */
    public function __construct(ResponseFactory $response, CategoryRepositoryInterface $repository)
    {
        $this->response = $response;
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->repository->all();
        return $this->response->view('codecategory::index', compact('categories'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->repository->all()->lists('name','id')->toArray();
        return $this->response->view('codecategory::create', compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('admin.categories.index');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $category = $this->repository->find($id);
        $categories = $this->repository->all()->lists('name','id')->toArray();

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
        $this->repository->find($id)->update($data);
        return redirect()->route('admin.categories.index');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $this->repository->destroy($id);
        return redirect()->route('admin.categories.index');
    }
    
}