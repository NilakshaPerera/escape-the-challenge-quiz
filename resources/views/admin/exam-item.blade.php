@extends('layouts.admin')
@section('content')

<style>
    .container-custom{
        background-color: #fbfbff;
        padding: 20px 50px;
        width:800px;
        margin: 0 auto;
        -webkit-box-shadow: 0px 0px 5px -1px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 5px -1px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 5px -1px rgba(0,0,0,0.75);
    }

    .question-sec .question{
        margin-bottom: 10px;
    }
    
    .question-sec .question h1 ,
    .question-sec .question h2,
    .question-sec .question h3,
    .question-sec .question h4{
        margin-top: 0px;
    }

    .question-sec .answers{
        margin-left: 20px;
    }

    .question-sec .correct{
        background-color: #c1f8c1;
    }

    .question-sec .student-answer{
        text-decoration: underline;
    }

    hr {
        border-color: #ededed;
    }

    .mb-5{
        margin-bottom: 20px;
    }
</style>

<?php
    $mcqAns = 0;
    $exam = \App\Exam::where('id', $data)->first();
    $participants = $exam->user->participant;
    $mcqs = $exam->mcq['mcqs'];
    $i = 0;

    $started = $exam->mcq['started'];
    $ended = $exam->mcq['ended'];

    $startMcq =  new DateTime(date('Y-m-d H:i:s', $started));
    $endMcq = new DateTime(date('Y-m-d H:i:s', $ended));
    $intervalMcq = $startMcq->diff($endMcq);
?>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="container-custom">
            <h3 class="text-center"><u>Escape the room challenge results</u></h3>
            <h2 class=""><u>Section MCQ - <span title="Time taken to complete the MCQ (H:M:S)" >({{ $intervalMcq->format("%H:%i:%s") }})</span> </u></h2>
            <?php
            foreach ($mcqs as $mcq) {
                $question = App\Question::where('id', $mcq['id'])->first();
                if ($question) {
                    ?>
                    <div class="question-sec">
                        <div class="question">
                            <table>
                                <tr>  
                                    <td>{!!  $question->question !!}</td>    
                                </tr>
                            </table>
                        </div>
                        <?php
                        $answ = json_decode($question->answers, true);
                        if($mcq['ans'] == $question->answer){
                            $mcqAns ++;
                        }
                        foreach ($answ as $index => $ans) {
                            ?>
                            <span class="answers {{($index == $question->answer) ? 'correct' : ''}} {{($index == $mcq['ans']) ? 'student-answer' : ''}}">
                                {{ $index }}  : {{ $ans }}
                            </span>
                            </br>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
                <hr>
                <?php
            }
            ?>

            <?php 
            $started = $exam->puzzle['started'];
            $ended = $exam->puzzle['ended'];

            $startPuzzle =  new DateTime(date('Y-m-d H:i:s', $started));
            $endPuzzle = new DateTime(date('Y-m-d H:i:s', $ended));
            $intervalPuzzle = $startPuzzle->diff($endPuzzle);
            ?>
            <div class="mb-5">
                <h2 class=""><u>Section Puzzle - <span title="Time taken to complete the Puzzle (H:M:S)" >({{ $intervalPuzzle->format("%H:%i:%s") }})</span></u></h2>
                
                <?php
                $tempor = $exam->puzzle['ans'];

                if (empty($tempor)) {
                    ?>
                    <p>
                        <font size="3">The candidate has not uploaded the Puzzle.</font>
                    </p>
                <?php } else { ?>
                    <a class="badge" target="_blank" href="{{ url('/') .'/uploads/puzzle-answers/' . $exam->puzzle['ans'] }}">Puzzle Answer Attachment</a>
                <?php } ?>
            </div>

            <?php 

            $started = $exam->presentation['started'];
            $ended = $exam->presentation['ended'];

            $startPresentation =  new DateTime(date('Y-m-d H:i:s', $started));
            $endPresentation = new DateTime(date('Y-m-d H:i:s', $ended));
            $intervalPresentation = $startPresentation->diff($endPresentation);

            ?>

            <div class="mb-5">
                <h2 class=""><u>Section Presentation - <span title="Time taken to complete the Presentation (H:M:S)" >({{ $intervalPresentation->format("%H:%i:%s") }})</span></u></h2>  
                
                <?php
                $tempo = $exam->presentation['ans'];

                if (empty($tempo)) {
                    ?>
                    <p>
                        <font size="3">The candidate has not uploaded the Presentation.</font>
                    </p>
                <?php } else { ?>
                    <a class="badge" target="_blank" href="{{ url('/') .'/uploads/presentation-answers/' . $exam->presentation['ans'] }}">Presentation Answer Attachment</a>
                <?php } ?>
            </div>
            <div class="ln_solid"></div>
            <form id="formadduser" name="formadduser" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{ route('admin/score') }}">
                @csrf  
                <?php if (session('errors')) { ?>
                    <div class="form-group ">
                        <div class="col-md-6 col-sm-6 col-xs-12 center-margin text-center">
                            <div class="alert alert-danger">
                                <ul>
                                    <?php
                                    foreach (session('errors') as $error) {
                                        ?>
                                        <li> {{ $error }}</li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <input type="hidden" id="id" name="id" value="{{ $data }}">
                <div class="form-group">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <input placeholder="MCQ Score" type="number" id="mcq-score" name="mcq-score" required="required" value="{{ ($exam->mcq_score == null)? $mcqAns: $exam->mcq_score }}" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <input placeholder="Puzzle Score" type="number" id="puzzle-score" name="puzzle-score" required="required" value="{{ ($exam->puzzle_score == null)? '': $exam->puzzle_score}}" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <input placeholder="Presentation Score" type="number" id="presentation-score" name="presentation-score" required="required" value="{{ ($exam->presentation_score == null)? '': $exam->presentation_score }}" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                        <button onclick="window.history.back()" class="btn btn-primary" type="button">Back</button>
                        <button type="submit" class="btn btn-success">Score</button>
                    </div>
                </div>
                <?php if (session('status')) { ?>
                    <div class="form-group ">
                        <div class="col-md-6 col-sm-6 col-xs-12 center-margin text-center">
                            <div class="alert alert-success"> {{ session('status') }}</div>
                        </div>
                    </div>
                <?php } ?>
            </form>
            
            <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone No</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            foreach ($participants as $participant) {
                                ?>
                                <tr>
                                    <td>{{ $participant->name }}</td>
                                    <td>{{ $participant->email }}</td>
                                    <td>{{ $participant->phone }}</td>
                                    
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
            
        </div>
    </div>
</div>

@endsection