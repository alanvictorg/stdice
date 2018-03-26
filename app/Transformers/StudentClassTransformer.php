<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\StudentClass;

/**
 * Class StudentClassTransformer.
 *
 * @package namespace App\Transformers;
 */
class StudentClassTransformer extends TransformerAbstract
{
    /**
     * Transform the StudentClass entity.
     *
     * @param \App\Entities\StudentClass $model
     *
     * @return array
     */
    public function transform(StudentClass $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
