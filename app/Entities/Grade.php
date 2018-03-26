<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Grade.
 *
 * @package namespace App\Entities;
 */
class Grade extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'classe_id',
        'n1',
        'n2',
        'n3',
        'media',
        'presence'
    ];

}
