<?php

namespace CodeLaravelVue\Presenters;

use CodeLaravelVue\Transformers\BillPayTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BillPayPresenter.
 *
 * @package namespace CodeLaravelVue\Presenters;
 */
class BillPayPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BillPayTransformer();
    }
}
