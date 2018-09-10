<?php

namespace CodeLaravelVue\Repositories;

use CodeLaravelVue\Presenters\CategoryPresenter;
use CodeLaravelVue\Repositories\Traits\CategoryRepositoryTrait;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeLaravelVue\Repositories\Interfaces\CategoryRevenueRepository;
use CodeLaravelVue\Models\CategoryRevenue;

/**
 * Class CategoryRevenueRepositoryEloquent.
 *
 * @package namespace CodeLaravelVue\Repositories;
 */
class CategoryRevenueRepositoryEloquent extends BaseRepository implements CategoryRevenueRepository
{
    use CategoryRepositoryTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CategoryRevenue::class;
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
