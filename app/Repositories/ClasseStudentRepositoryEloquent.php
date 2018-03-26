<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ClasseStudentRepository;
use App\Entities\ClasseStudent;
use App\Validators\ClasseStudentValidator;

/**
 * Class ClasseStudentRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ClasseStudentRepositoryEloquent extends BaseRepository implements ClasseStudentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ClasseStudent::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
