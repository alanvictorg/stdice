<?php

namespace App\Http\Controllers;

use App\Repositories\TeacherRepository;
use Illuminate\Http\Request;

class TeachersController extends Controller
{

    /**
     * @var TeacherRepository
     */
    private $teachersRepository;

    /**
     * TeachersController constructor.
     * @param $teachersRepository
     */
    public function __construct(TeacherRepository $teachersRepository)
    {
        $this->teachersRepository = $teachersRepository;
    }

    /**
     * @return TeacherRepository
     */
    public function getTeachersRepository()
    {
        return $this->teachersRepository;
    }

    /**
     * @param TeacherRepository $teachersRepository
     */
    public function setTeachersRepository($teachersRepository)
    {
        $this->teachersRepository = $teachersRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = $this->teachersRepository->all();
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $teacher = $this->teachersRepository->create($data);

        $response = [
            'message' => 'Professor cadastrado.',
            'data'    => $teacher->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->back()->with('message', $response['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = $this->teachersRepository->find($id);

        return view ('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $teacher = $this->teachersRepository->update($data, $id);
        $response = [
            'message' => 'Exchange updated.',
            'data'    => $teacher->toArray(),
        ];

        if ($request->wantsJson()) {

            return response()->json($response);
        }

        return redirect()->back()->with('message', $response['message']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->teachersRepository->delete($id);

        $response = [
            'message' => 'Professor deletado'
        ];

        return redirect()->back()->with('message', $response['message']);
    }
}
