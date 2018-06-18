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
            'logo'       => $this->makeLogoPath($model),
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function makeLogoPath(Bank $model){
        $url    = url('/');
        $folder = Bank::logosDir();
        return "{$url}/storage/{$folder}/{$model->logo}";
    }
}
