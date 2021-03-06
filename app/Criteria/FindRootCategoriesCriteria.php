<?php

namespace CodeLaravelVue\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindRootCategoriesCriteria.
 *
 * @package namespace CodeLaravelVue\Criteria;
 */
class FindRootCategoriesCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->whereIsRoot();
    }
}
