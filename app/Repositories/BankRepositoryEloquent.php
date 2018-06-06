<?php

namespace CodeLaravelVue\Repositories;

use CodeLaravelVue\Events\BankStoredEvent;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeLaravelVue\Models\Bank;

/**
 * Class BankRepositoryEloquent.
 *
 * @package namespace CodeLaravelVue\Repositories;
 */
class BankRepositoryEloquent extends BaseRepository implements BankRepository
{
    public function create(array $attributes){

        $logo               = $attributes['logo'];
        $attributes['logo'] = "semimagem.jpeg";
        $model              =  parent::create($attributes);

        $event = new BankStoredEvent($model, $logo);
        event($event);

        return $model;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Bank::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
