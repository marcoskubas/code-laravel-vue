<?php

namespace CodeLaravelVue\Transformers;

use League\Fractal\TransformerAbstract;
use CodeLaravelVue\Models\BillPay;

/**
 * Class BillPayTransformer.
 *
 * @package namespace CodeLaravelVue\Transformers;
 */
class BillPayTransformer extends TransformerAbstract
{
    /**
     * Transform the BillPay entity.
     *
     * @param \CodeLaravelVue\Models\BillPay $model
     *
     * @return array
     */
    public function transform(BillPay $model)
    {
        return [
            'id'         => (int) $model->id,
            'date_due'   => $model->date_due,
            'name'       => $model->name,
            'value'      => (float) $model->value,
            'done'       => (boolean) $model->done,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
