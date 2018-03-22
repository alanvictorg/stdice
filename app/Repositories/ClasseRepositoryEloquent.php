<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ClasseRepository;
use App\Entities\Classe;
use App\Validators\ClasseValidator;

/**
 * Class ClasseRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ClasseRepositoryEloquent extends BaseRepository implements ClasseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Classe::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ClasseValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
