<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\StudentClassCreateRequest;
use App\Http\Requests\StudentClassUpdateRequest;
use App\Repositories\StudentClassRepository;
use App\Validators\StudentClassValidator;

/**
 * Class StudentClassesController.
 *
 * @package namespace App\Http\Controllers;
 */
class StudentClassesController extends Controller
{
    /**
     * @var StudentClassRepository
     */
    protected $repository;

    /**
     * @var StudentClassValidator
     */
    protected $validator;

    /**
     * StudentClassesController constructor.
     *
     * @param StudentClassRepository $repository
     * @param StudentClassValidator $validator
     */
    public function __construct(StudentClassRepository $repository, StudentClassValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $studentClasses = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $studentClasses,
            ]);
        }

        return view('studentClasses.index', compact('studentClasses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StudentClassCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(StudentClassCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $studentClass = $this->repository->create($request->all());

            $response = [
                'message' => 'StudentClass created.',
                'data'    => $studentClass->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
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
        $studentClass = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $studentClass,
            ]);
        }

        return view('studentClasses.show', compact('studentClass'));
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
        $studentClass = $this->repository->find($id);

        return view('studentClasses.edit', compact('studentClass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StudentClassUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(StudentClassUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $studentClass = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'StudentClass updated.',
                'data'    => $studentClass->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
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
                'message' => 'StudentClass deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'StudentClass deleted.');
    }
}
