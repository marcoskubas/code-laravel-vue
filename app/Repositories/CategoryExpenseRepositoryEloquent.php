<?php

namespace CodeLaravelVue\Repositories;

use CodeLaravelVue\Presenters\CategoryPresenter;
use CodeLaravelVue\Repositories\Traits\CategoryRepositoryTrait;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeLaravelVue\Repositories\Interfaces\CategoryExpenseRepository;
use CodeLaravelVue\Models\CategoryExpense;

/**
 * Class CategoryExpenseRepositoryEloquent.
 *
 * @package namespace CodeLaravelVue\Repositories;
 */
class CategoryExpenseRepositoryEloquent extends BaseRepository implements CategoryExpenseRepository
{
    use CategoryRepositoryTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CategoryExpense::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return CategoryPresenter::class;
    }
    
}
