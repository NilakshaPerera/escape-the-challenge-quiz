<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Welcome as WelcomeResource;
use App\User;
use Validator;
use Auth;
use App\Participant;

class WelcomeController extends Controller {

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
        return view('welcome');
    }

    public function user(Request $rquest) {
        return new WelcomeResource(Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }


    /**
     * Created By : Nilaksha 
     * Created At : 7-3-2019
     * Summary : Creates a participant entry in participants modal 
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
                    'school' => 'required',
                    'name' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'teacher' => 'required',
                    'teacher_phone' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()->all()]);
        }
        
        $i = 0;
        foreach ($request['name']  as $name) {

            $user = Participant::create(array(
                'user_id' => Auth::user()->id,
                'name' =>  $name,
                'email' =>  $request['email'][$i],
                'phone' =>  $request['phone'][$i],
            ));

            ++$i;
        }

         if (Auth::user()) {
             User::where('id' , Auth::user()->id)
                     ->update(['school' => $request['school'] , 'contact' => $request['contact'] ,'teacher' => $request['teacher'] , 'teacher_phone' => $request['teacher_phone'] ,'teacher_email' => $request['teacher_email'] ]);
             return response()->json(['success' => true, 'message' => array('Success!')]);
         }

       return response()->json(['success' => false, 'errors' => array(['An error occured.'])]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
