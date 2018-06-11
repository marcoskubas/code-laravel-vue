<?php

namespace CodeLaravelVue\Transformers;

use League\Fractal\TransformerAbstract;
use CodeLaravelVue\Models\BankAccount;

/**
 * Class BankAccountTransformer.
 *
 * @package namespace CodeLaravelVue\Transformers;
 */
class BankAccountTransformer extends TransformerAbstract
{
    /**
     * Transform the BankAccount entity.
     *
     * @param \CodeLaravelVue\Models\BankAccount $model
     *
     * @return array
     */
    public function transform(BankAccount $model)
    {
        return [
            'id'      => (int) $model->id,
            'name'    => $model->name,
            'agency'  => $model->agency,
            'account' => $model->account,
            'default' => (bool) $model->default,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
