<?php

namespace CodeLaravelVue\Transformers;

use League\Fractal\TransformerAbstract;
use CodeLaravelVue\Models\Category;

/**
 * Class CategoryTransformer.
 *
 * @package namespace CodeLaravelVue\Transformers;
 */
class CategoryTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['children'];
    
    /**
     * Transform the Category entity.
     *
     * @param \CodeLaravelVue\Models\Category $model
     *
     * @return array
     */
    public function transform(Category $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'parent_id'  => $model->parent_id,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeChildren(Category $model){
        if($model->children){
            return $this->collection($model->children, new CategoryTransformer());
        }
    }
}
