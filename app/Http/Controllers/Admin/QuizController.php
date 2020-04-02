<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;
use Hash;
use App\Question;


class QuizController extends Controller {

    /**
     * Created By : Nilaksha 
     * Created At : 7-3-2019
     * Summary : Constructor check if user is logged in
     */
    public function __construct() {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Created By : Nilaksha
     * Created At : 7-3-2019
     * Summary : Returns User blade under admin views section
     * @return type
     */
    public function index() {
        return view('admin.quiz.quiz');
    }

    /**
     * Created By : Nilaksha 
     * Created At : 9-4-2019
     * Summary : Create new question
     * @param Request $request
     * @return type
     */
    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
                    'txttitle' => 'required',
                    'txtquestion' => 'required',
                    'txtanswers' => 'required',
                    'txtanswer' => 'required',
        ]);
        if ($validator->fails()) {
             return redirect('admin/quizes')->with('errors', $validator->errors()->all());
        }
        
        $answersArray = array();
        $i = 1;
        foreach($request['txtanswers'] as $answer){
            $answersArray[$i] = $answer;
            $i++;
        }
        
        $user = Question::create(array(
                    'title' => $request['txttitle'],
                    'question' => $request['txtquestion'],
                    'answers' =>  json_encode($answersArray),
                    'answer' => $request['txtanswer'],
                  
        ));
        return redirect('admin/quizes')->with('status', 'Question Created!');
    }

    /**
     * Created By : Nilaksha 
     * Created At : 7-3-2019
     * Summary : Edit a user in the admin section
     * @param type $id
     * @return type
     */
    public function edit($id) {
        $questions = Question::where('id', $id)->first();
        $data = array('question' => $questions);
        return view('admin.quiz.edit_quiz')->with('data', $data);
    }

    /**
     * Created By : Nilaksha 
     * Created At : 7-3-2019
     * Summary : Update a user with new values
     * @param Request $data
     * @return type
     */
    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
                    'txttitle' => 'required',
                    'txtquestion' => 'required',
                    'txtanswers' => 'required',
                    'txtanswer' => 'required',
        ]);
        if ($validator->fails()) {
             return redirect('admin/quizes')->with('errors', $validator->errors()->all());
        }
        
        $answersArray = array();
        $i = 1;
        foreach($request['txtanswers'] as $answer){
            $answersArray[$i] = $answer;
            $i++;
        }
        
        $user = Question::where(
                'id' , $request['hash'] )
                ->update(
                array(
                    'title' => $request['txttitle'],
                    'question' => $request['txtquestion'],
                    'answers' =>  json_encode($answersArray),
                    'answer' => $request['txtanswer'],
        ));
        return redirect('admin/quizes/'. $request['hash'] .'/edit')->with('status', 'Question Updated!');
    }

}
