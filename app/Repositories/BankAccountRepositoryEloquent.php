<?php

namespace CodeLaravelVue\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeLaravelVue\Repositories\BankAccountRepository;
use CodeLaravelVue\Models\BankAccount;
use CodeLaravelVue\Presenters\BankAccountPresenter;

/**
 * Class BankAccountRepositoryEloquent.
 *
 * @package namespace CodeLaravelVue\Repositories;
 */
class BankAccountRepositoryEloquent extends BaseRepository implements BankAccountRepository
{
    // protected $skipPresenter = true;
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BankAccount::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter(){
        return BankAccountPresenter::class;
    }
    
}
