@extends('layouts.admin')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">    
    <div class="x_panel">
        <div class="x_title">
            <h2>Update Puzzle <small>Update the questions and answers.</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form id="formadduser" name="formadduser"  enctype='multipart/form-data' data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{ route('admin/puzzle-update') }}">
                @csrf
                <?php if (session('errors')) { ?>
                    <div class="form-group ">
                        <div class="col-md-6 col-sm-6 col-xs-12 center-margin text-center">
                            <div class="alert alert-danger">
                                <ul>
                                    <?php
                                    foreach (session('errors') as $error) {
                                        ?>
                                        <li>{{ $error }}</li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Question Title <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="{{ $data['puzzle']->name }}" id="txttitle" name="txttitle" required="required" value="" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Clues Across <span class="required">*</span>
                    </label>
                    <div id="dynamic-answer-container" name="dynamic-answer-container" class="col-md-6 col-sm-6 col-xs-12">

                        <?php
                        $answers = json_decode($data['puzzle']->clues_a, true);
                        foreach ($answers as $answer) {
                            ?>
                            <div id="" name="" class="dynamic-answer" >
                                <div class="col-md-10 col-sm-10 col-xs-11" style="margin-bottom: 5px; padding-left: 0">   
                                    <input value="{{ $answer }}" name="txtanswers[]" required class="form-control col-md-7 col-xs-12"> 
                                </div>
                                <div class="col-md-1 col-sm-1 col-xs-1"  style="margin-bottom: 5px;">  
                                    <input onclick="clone($(this) , {{ App\Setting::where('setting' , 'puzzle_clue_count')->first()->data }} , 'dynamic-answer' , 'dynamic-answer-container')" class="btn-add-question btn" type="button" value="+">
                                </div>
                                <div class="col-md-1 col-sm-1 col-xs-1"  style="margin-bottom: 5px;">  
                                    <input onclick="remove($(this) , 'dynamic-answer')" class="btn-add-question btn" type="button" value="-">
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Clues Down <span class="required">*</span>
                    </label>
                    <div id="dynamic-answer-container-d" name="dynamic-answer-container-d" class="col-md-6 col-sm-6 col-xs-12">

                        <?php
                        $answers = json_decode($data['puzzle']->clues_d, true);
                        foreach ($answers as $answer) {
                            ?>
                            <div id="" name="" class="dynamic-answer-d" >
                                <div class="col-md-10 col-sm-10 col-xs-11" style="margin-bottom: 5px; padding-left: 0">   
                                    <input value="{{ $answer }}" name="txtanswers_d[]" required class="form-control col-md-7 col-xs-12"> 
                                </div>
                                <div class="col-md-1 col-sm-1 col-xs-1"  style="margin-bottom: 5px;">  
                                    <input onclick="clone($(this) , {{ App\Setting::where('setting' , 'puzzle_clue_count')->first()->data }} , 'dynamic-answer-d' , 'dynamic-answer-container-d')" class="btn-add-question btn" type="button" value="+">
                                </div>
                                <div class="col-md-1 col-sm-1 col-xs-1"  style="margin-bottom: 5px;">  
                                    <input onclick="remove($(this) , 'dynamic-answer-d')" class="btn-add-question btn" type="button" value="-">
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Puzzle <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="{{ $data['puzzle']->answer }}" type="file" id="filepuzzle" name="filepuzzle" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <?php if (session('status')) { ?>
                    <div class="form-group ">
                        <div class="col-md-6 col-sm-6 col-xs-12 center-margin text-center">
                            <div class="alert alert-success"> {{ session('status') }}</div>
                        </div>
                    </div>
                <?php } ?>
                <div class="ln_solid"></div>
                <input id="hash" name="hash" type="hidden" value="{{ $data['puzzle']->id }}">
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button onclick="window.location = '{{url('/admin/puzzles')}}'" class="btn btn-primary" type="button">Back</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
