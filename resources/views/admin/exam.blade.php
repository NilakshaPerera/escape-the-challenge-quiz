@extends('layouts.admin')

@section('content')
<style>
    .exam-block{
        margin: 10px;
        padding: 0!important;
        background-color: #fbfbff;
        border-radius: 10px;
        -webkit-box-shadow: 0px 0px 5px -1px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 5px -1px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 5px -1px rgba(0,0,0,0.75);
    }

    .exam-block>a>div{
        padding: 8px;
    }

    .exam-block hr{
        margin-top: 2px;
        margin-bottom: 2px;
    }

    .exam-block .p-all{
        padding: 10px;
    }

    .zoom:hover {
        transform: scale(1.05); 
    }
</style>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <h3 class="text-center">Exam session results</h3>
        <div class="row">
            <?php
            // role_id branch_id name email contact empid
            $sessions = App\Exam::where('started', '!=', null)
                    ->where('ended', '!=', null)
                    ->orderBy('id', 'DESC')
                    ->paginate(18);
            foreach ($sessions as $session) {
                ?>
                <div class="col-md-2 exam-block zoom">
                    <a class="" href="{{ route('admin/exams/item' , $session->id) }}">
                        <div>
                            <h4 style="min-height: 59px;" class="text-center">{{ $session->user->school }}</h4>
                            <hr>
                            <div style="min-height: 150px;" class="p-all">
                                <span><b>Lead :</b> {{$session->user->name}}</span> </br>
                                <span><b>Email :</b> {{$session->user->email}}</span> </br>
                                <span><b>Contact :</b> {{$session->user->contact}}</span> </br>
                                <span><b>Date Started :</b> {{$session->created_at->format('Y-m-d')}}</span> </br>
                                <span><b>Time Started :</b> {{$session->created_at->format('H:i:s')}}</span> </br>
                            </div>
                            <hr>
                            <div class="p-all">
                                <span><b>MCQ :</b> {{ ($session->mcq_score == null)? "Not Scored": $session->mcq_score }}</span> </br>
                                <span><b>Puzzle :</b> {{ ( $session->puzzle_score == null )? "Not Scored": $session->puzzle_score }}</span> </br>
                                <span><b>Presentation :</b> {{ ($session->presentation_score == null)? "Not Scored": $session->presentation_score }}</span> </br>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
        {{ $sessions->links() }}
    </div>
</div>

@endsection