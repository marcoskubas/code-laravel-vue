<?php

namespace CodeLaravelVue\Repositories;

use CodeLaravelVue\Events\BankStoredEvent;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeLaravelVue\Models\Bank;
use Illuminate\Http\UploadedFile;
use CodeLaravelVue\Presenters\BankPresenter;

/**
 * Class BankRepositoryEloquent.
 *
 * @package namespace CodeLaravelVue\Repositories;
 */
class BankRepositoryEloquent extends BaseRepository implements BankRepository
{
    public function create(array $attributes){

        $logo               = $attributes['logo'];
        $attributes['logo'] = env('BANK_LOGO_DEFAULT');
        $model              =  parent::create($attributes);

        $event = new BankStoredEvent($model, $logo);
        event($event);

        return $model;
    }

    public function update(array $attributes, $id){
        
        $logo = null;
        if(isset($attributes['logo']) && $attributes['logo'] instanceof UploadedFile){
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

    public function presenter(){
        return BankPresenter::class;
    }
    
}
