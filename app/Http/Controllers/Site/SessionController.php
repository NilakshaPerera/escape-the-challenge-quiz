<?php

namespace App\Http\Controllers\Site; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Exam;
use App\Question;
use App\Puzzle;
use App\Presentation;
use App\Library\Helper;
use Auth;
class SessionController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware(['auth', 'verified', 'student']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        // Silence is golden
    }

    /**
     * Created By : Nilaksha 
     * Created At : 15-4-2019
     * Summary : Will return the current unfinished session at any time if unfinished sessions are not available, 
     *          the function will generate a list of mcqs from Questions table, 
     *          get a puzzle question from the puzzle pool.
     *          get a presentation question from the presentation pool manually
     *          and prepare the quiz. 
     *          
     *          A JSON version is sent back to the front end to be saved as a cookie
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function session(Request $request) {

        $currectSession = Helper::currentSession();
        if (!$currectSession) {
            // get random mcqs
            $mcqs = Question::select('id')->inRandomOrder()->take( Setting::where('setting' , 'mcq_count')->first()->data )->get();
            $mcq = array();
            foreach($mcqs as $mcqItem){
                $mcqEl = array();
                $mcqEl['id'] = $mcqItem->id;
                $mcqEl['ans'] = '';
                array_push($mcq , $mcqEl);
            }

            // get random puzzles 
            $puzzle = Puzzle::select('id')->inRandomOrder()->first();

            // get random presentations
            $presentation = Presentation::select('id')->inRandomOrder()->first();

            $mcq = ['started' => '', 'ended' => '', 'timeoutin' => Setting::where('setting' , 'mcq_time')->first()->data, 'mcqs' =>  $mcq ];
            $puzzle = ['started' => '', 'ended' => '', 'timeoutin' => Setting::where('setting' , 'puzzle_time')->first()->data, 'puzzles' => $puzzle->id , 'ans' => ''];
            $presentation = ['started' => '', 'ended' => '', 'timeoutin' => Setting::where('setting' , 'presentation_time')->first()->data, 'presentations' => $presentation->id, 'ans' => ''];

            $currectSession = Exam::create([
                        'user_id' => Auth::user()->id,
                        'session' => Helper::randomString(),
                        'mcq' => $mcq,
                        'puzzle' => $puzzle,
                        'presentation' => $presentation,
                        'started' => date("Y-m-d H:i:s"),
            ]);
        }

        $sessArray = [
            'session' => $currectSession->session,
            'mcq' => $currectSession->mcq,
            'puzzle' => $currectSession->puzzle,
            'presentation' => $currectSession->presentation
        ];
        return response()->json(['success' => true, 'data' => $sessArray]);
    }

}
