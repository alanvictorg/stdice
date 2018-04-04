<?php

namespace App\Http\Controllers;

use App\Entities\Event;
use App\Entities\Student;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Calendar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->authorize('dashboard.index');
        $allStudents = Student::all();
        $students = Student::has('classes')->get();

        $percentStudents = ($students->count() / $allStudents->count()) * 100;

        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#ff0000',
                        'url' => 'pass here url and any route',
                    ]
                );
            }
        }
        $calendar = \MaddHatter\LaravelFullcalendar\Facades\Calendar::addEvents($events);

        return view('home', compact('students', 'percentStudents','calendar'));
    }
}
