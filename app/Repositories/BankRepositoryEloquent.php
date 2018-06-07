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

    public function update(array $attributes, $id){
        
        $logo = null;
        if(isset($attributes['logo'])){
            $logo  = $attributes['logo'];
            unset($attributes['logo']);
        }

        $model = parent::update($attributes, $id);
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
