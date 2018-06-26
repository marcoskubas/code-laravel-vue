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
    public function create(array $attributes){

        Category::$enableTenant = false;
        if(isset($attributes['parent_id'])){
            //child
            $skipPresenter = $this->skipPresenter;
            $this->skipPresenter(true);
            $parent = $this->find($attributes['parent_id']);
            $this->skipPresenter = $skipPresenter;
            $child = $parent->children()->create($attributes);

            $result = $this->parserResult($child);

        }else{
            //parent
            $result = parent::create($attributes);
        }

        Category::$enableTenant = true;
        return $result;
    }

    public function update(array $attributes, $id){
        
        Category::$enableTenant = false;
        if(isset($attributes['parent_id'])){
            //child
            $skipPresenter = $this->skipPresenter;
            $this->skipPresenter(true);
            $child = $this->find($id);
            $child->parent_id = $attributes['parent_id'];
            $child->save();
            $this->skipPresenter = $skipPresenter;

            $result = $this->parserResult($child);

        }else{
            //parent
            $result = parent::update($attributes, $id);
        }

        Category::$enableTenant = true;
        return $result;
    }

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
