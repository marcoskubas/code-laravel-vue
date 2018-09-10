<?php

namespace CodeLaravelVue\Http\Controllers\Api;

use CodeLaravelVue\Criteria\WithDepthCategoriesCriteria;
use CodeLaravelVue\Http\Controllers\Controller;
use CodeLaravelVue\Repositories\Interfaces\CategoryRevenueRepository;


class CategoryRevenuesController extends Controller
{
    use CategoriesControllerTrait;

    /**
     * @var CategoryRevenueRepository
     */
    protected $repository;


    public function __construct(CategoryRevenueRepository $repository)
    {
        $this->repository = $repository;
        $this->repository->pushCriteria(new WithDepthCategoriesCriteria());
    }
}