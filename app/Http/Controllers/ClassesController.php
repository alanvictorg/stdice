<?php

namespace App\Http\Controllers;

use App\Entities\Course;
use App\Entities\Grade;
use App\Entities\Student;
use App\Entities\StudentClass;
use App\Entities\Teacher;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ClasseCreateRequest;
use App\Http\Requests\ClasseUpdateRequest;
use App\Repositories\ClasseRepository;
use App\Validators\ClasseValidator;

/**
 * Class ClassesController.
 *
 * @package namespace App\Http\Controllers;
 */
class ClassesController extends Controller
{
    /**
     * @var ClasseRepository
     */
    protected $repository;

    /**
     * @var ClasseValidator
     */
    protected $validator;

    /**
     * ClassesController constructor.
     *
     * @param ClasseRepository $repository
     * @param ClasseValidator $validator
     */
    public function __construct(ClasseRepository $repository, ClasseValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $classes = $this->repository->all();

        $courses = Course::pluck('name', 'id');
        $teachers = Teacher::pluck('name', 'id');
        $turnos = ['manha' => 'Manhã', 'tarde' => 'Tarde', 'noite' => 'Noite'];
        $students = Student::all();
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $classes,
            ]);
        }

        return view('classes.index', compact('classes', 'courses',
            'teachers', 'turnos', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ClasseCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ClasseCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $classe = $this->repository->create($request->all());

            $response = [
                'message' => 'Turma criada',
                'data' => $classe->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classe = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $classe,
            ]);
        }

        return view('classes.show', compact('classe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classe = $this->repository->find($id);
        $courses = Course::pluck('name', 'id');
        $teachers = Teacher::pluck('name', 'id');
        $turnos = ['manha' => 'Manhã', 'tarde' => 'Tarde', 'noite' => 'Noite'];
        return view('classes.edit', compact('classe', 'courses', 'teachers', 'turnos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ClasseUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ClasseUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $classe = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Turma atualizada',
                'data' => $classe->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Turma deletada',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Turma deletada');
    }

    public function register(Request $request, $id)
    {
        $data = $request->all();
        $matriculado = false;
        foreach ($data['students'] as $studentid) {
            $student = Student::find($studentid);
            foreach ($student->classes as $class) {
                if ($class->id == $id) {
                    $matriculado = true;
                }
            }
            if (!$matriculado) {
                $dataRegister['student_id'] = $studentid;
                $dataRegister['classe_id'] = $id;
                $register = StudentClass::create($dataRegister);

                $dataGrade['student_id'] = $studentid;
                $dataGrade['classe_id'] = $id;
                $grade = Grade::create($dataGrade);
            }
            $matriculado = false;
        }
        return redirect()->back()->with('message', 'Alunos matriculados');
    }

    public function toassign($classid)
    {
        $class = $this->repository->find($classid);
        $studentsOfClass = $class->students;

        foreach ($studentsOfClass as $key => $student) {
            $nome = explode(" ", $student->nome );
            $studentsOfClass[$key]->nome = $nome[0]." ".$nome[1];
            foreach ($student->grades as $grade) {
                if ($grade->classe_id == $classid) {
                    $studentsOfClass[$key]['grade'] = $grade;
                }
            }
        }

        return view('classes.toassign', compact('studentsOfClass'));
    }

    public function assign(Request $request)
    {
        $data = $request->all();
        $students = $data['students'];
        foreach ($students as $student) {
            $media = number_format((($student['n1'] + $student['n2'] + $student['n3']) / 3), 2);
            $updateGrade = Grade::where('classe_id',$student['classe_id'])
                ->where('student_id', $student['student_id'])
                ->update(['n1'=> $student['n1'], 'n2' => $student['n2'],
                    'n3' => $student['n3'], 'media' => $media,
                    'presence' => $student['presence']]);
        }
        return redirect()->back()->with('message', 'Atualização feita');

    }

}
