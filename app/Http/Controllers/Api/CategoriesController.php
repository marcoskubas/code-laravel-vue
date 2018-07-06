<?php

namespace CodeLaravelVue\Http\Controllers\Api;

use Illuminate\Http\Request;

use CodeLaravelVue\Http\Controllers\Controller;
use CodeLaravelVue\Http\Requests;
use CodeLaravelVue\Http\Requests\CategoryRequest;
use CodeLaravelVue\Repositories\CategoryRepository;
use CodeLaravelVue\Criteria\FindByNameCriteria;
use CodeLaravelVue\Criteria\FindByLikeAgencyCriteria;
use CodeLaravelVue\Criteria\FindRootCategoriesCriteria;
use CodeLaravelVue\Criteria\WithDepthCategoriesCriteria;
// use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class CategorysController.
 *
 * @package namespace CodeLaravelVue\Http\Controllers\Api;
 */
class CategoriesController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $repository;

    /**
     * CategorysController constructor.
     *
     * @param CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
        $this->repository->pushCriteria(new WithDepthCategoriesCriteria());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {                    
        $this->repository->pushCriteria(new FindRootCategoriesCriteria());
        $categories = $this->repository->all();
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoryRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->repository->skipPresenter()->create($request->all());
        $this->repository->skipPresenter(false);
        $category = $this->repository->find($category->id);
        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->repository->find($id);
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoryRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = $this->repository->skipPresenter()->update($request->all(), $id);
        $this->repository->skipPresenter(false);
        $category = $this->repository->find($category->id);
        return response()->json($category, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        return response()->json([], 204);
    }
}
