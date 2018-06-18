<?php

namespace CodeLaravelVue\Transformers;

use CodeLaravelVue\Models\Bank;
use League\Fractal\TransformerAbstract;

/**
 * Class BankTransformer.
 *
 * @package namespace CodeLaravelVue\Transformers;
 */
class BankTransformer extends TransformerAbstract
{
    /**
     * Transform the BankAccount entity.
     *
     * @param \CodeLaravelVue\Models\Bank $model
     *
     * @return array
     */
    public function transform(Bank $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
