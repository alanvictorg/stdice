<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Student.
 *
 * @package namespace App\Entities;
 */
class Student extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'email',
        'filiacao',
        'matricula',
        'dt_nasc',
        'natural',
        'cpf',
        'rg',
        'org_exp',
        'est_civil',
        'escolaridade',
        'endereco',
        'local_trabalho',
        'data_conversao',
        'batismo',
        'membro',
        'batismo_espirito',
        'nome_igreja',
        'end_igreja',
        'nome_pastor',
        'tel_pastor',
        'chamado_ministerial',
        'comunhao_igreja',
    ];

    public function classes()
    {
        return $this->belongsToMany(Classe::class, 'student_classes');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

}
