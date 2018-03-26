<?php

namespace App\Presenters;

use App\Transformers\StudentClassTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class StudentClassPresenter.
 *
 * @package namespace App\Presenters;
 */
class StudentClassPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new StudentClassTransformer();
    }
}
