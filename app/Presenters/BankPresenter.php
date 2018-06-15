<?php

namespace CodeLaravelVue\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BankPresenter
 * @package CodeLaravelVue\Presenters
 */
class BankPresenter extends FractalPresenter
{
    /**
     * @return BankTransformer|\League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BankTransformer();
    }
}