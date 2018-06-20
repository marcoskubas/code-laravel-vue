<?php

namespace CodeLaravelVue\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeLaravelVue\Repositories\CategoryRepository;
use CodeLaravelVue\Models\Category;
use CodeLaravelVue\Validators\CategoryValidator;
use CodeLaravelVue\Presenters\CategoryPresenter;

/**
 * Class CategoryRepositoryEloquent.
 *
 * @package namespace CodeLaravelVue\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function presenter(){
        return CategoryPresenter::class;
    }
}
