<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\RoleUser;

/**
 * Class RoleUserTransformer.
 *
 * @package namespace App\Transformers;
 */
class RoleUserTransformer extends TransformerAbstract
{
    /**
     * Transform the RoleUser entity.
     *
     * @param \App\Entities\RoleUser $model
     *
     * @return array
     */
    public function transform(RoleUser $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
