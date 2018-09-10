<?php

namespace CodeLaravelVue\Http\Controllers\Api;

use CodeLaravelVue\Criteria\WithDepthCategoriesCriteria;
use CodeLaravelVue\Http\Controllers\Controller;
use CodeLaravelVue\Repositories\Interfaces\CategoryExpenseRepository;


class CategoryExpensesController extends Controller
{
    use CategoriesControllerTrait;

    /**
     * @var CategoryExpenseRepository
     */
    protected $repository;


    public function __construct(CategoryExpenseRepository $repository)
    {
        $this->repository = $repository;
        $this->repository->pushCriteria(new WithDepthCategoriesCriteria());
    }
}