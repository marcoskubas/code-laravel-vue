<?php

namespace CodeLaravelVue\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeLaravelVue\Repositories\MyModelRepository;
use CodeLaravelVue\Models\MyModel;

/**
 * Class MyModelRepositoryEloquent.
 *
 * @package namespace CodeLaravelVue\Repositories;
 */
class MyModelRepositoryEloquent extends BaseRepository implements MyModelRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MyModel::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
