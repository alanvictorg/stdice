<?php

namespace App\Presenters;

use App\Transformers\RoleUserTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RoleUserPresenter.
 *
 * @package namespace App\Presenters;
 */
class RoleUserPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RoleUserTransformer();
    }
}
