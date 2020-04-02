<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;
use Hash;
use App\Puzzle;

class PuzzleController extends Controller {

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
        return view('admin.puzzle.puzzle');
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
                    'txtanswers' => 'required',
                    'txtanswers_d' => 'required',
                    'filepuzzle' => 'required|file',
        ]);
        if ($validator->fails()) {
            return redirect('admin/quizes')->with('errors', $validator->errors()->all());
        }

        $answersArray = array();
        $i = 1;
        foreach ($request['txtanswers'] as $answer) {
            $answersArray[$i] = $answer;
            $i++;
        }

        $answersArrayD = array();
        $j = 1;
        foreach ($request['txtanswers_d'] as $answer) {
            $answersArrayD[$j] = $answer;
            $j++;
        }

        // Upload file
        $uploadedFile = $request->file('filepuzzle');
        $filename = $uploadedFile->getClientOriginalName();
        $uFileName = time() . '-' . $filename;
        Storage::disk('public_uploads')->putFileAs('puzzles', $uploadedFile, $uFileName);

        $user = Puzzle::create(array(
                    'name' => $request['txttitle'],
                    'clues_a' => json_encode($answersArray),
                    'clues_d' => json_encode($answersArrayD),
                    'file' => 'uploads/puzzles/' . $uFileName,
        ));
        return redirect('admin/puzzles')->with('status', 'Question Created!');
    }

    /**
     * Created By : Nilaksha 
     * Created At : 7-3-2019
     * Summary : Edit a user in the admin section
     * @param type $id
     * @return type
     */
    public function edit($id) {
        $questions = Puzzle::where('id', $id)->first();
        $data = array('puzzle' => $questions);
        return view('admin.puzzle.edit_puzzle')->with('data', $data);
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
                    'txtanswers' => 'required',
                    'txtanswers_d' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('admin/puzzles')->with('errors', $validator->errors()->all());
        }

        $answersArray = array();
        $i = 1;
        foreach ($request['txtanswers'] as $answer) {
            $answersArray[$i] = $answer;
            $i++;
        }
        
        $answersArrayD = array();
        $j = 1;
        foreach ($request['txtanswers_d'] as $answer) {
            $answersArrayD[$j] = $answer;
            $j++;
        }

        if ($request->hasFile('filepuzzle')) {

            $uploadedFile = $request->file('filepuzzle');
            $filename = $uploadedFile->getClientOriginalName();
            $uFileName = time() . '-' . $filename;
            Storage::disk('public_uploads')->putFileAs('puzzles', $uploadedFile, $uFileName);

            $user = Puzzle::where(
                            'id', $request['hash'])
                    ->update(
                    array(
                        'name' => $request['txttitle'],
                        'clues_a' => json_encode($answersArray),
                        'clues_d' => json_encode($answersArrayD),
                        'file' => 'uploads/puzzles/' . $uFileName,
            ));
        } else {
            $user = Puzzle::where(
                            'id', $request['hash'])
                    ->update(
                    array(
                        'name' => $request['txttitle'],
                        'clues_a' => json_encode($answersArray),
                        'clues_d' => json_encode($answersArrayD),
            ));
        }

        return redirect('admin/puzzles/' . $request['hash'] . '/edit')->with('status', 'Question Updated!');
    }

}
