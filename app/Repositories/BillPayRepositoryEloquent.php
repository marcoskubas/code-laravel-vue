<?php

namespace CodeLaravelVue\Repositories;

use CodeLaravelVue\Presenters\BillPayPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeLaravelVue\Repositories\Interfaces\BillPayRepository;
use CodeLaravelVue\Models\BillPay;
use CodeLaravelVue\Validators\BillPayValidator;

/**
 * Class BillPayRepositoryEloquent.
 *
 * @package namespace CodeLaravelVue\Repositories;
 */
class BillPayRepositoryEloquent extends BaseRepository implements BillPayRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BillPay::class;
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
        return BillPayPresenter::class;
    }

}
