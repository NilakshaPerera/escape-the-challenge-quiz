@extends('layouts.admin')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">    
    <div class="x_panel">
        <div class="x_title">
            <h2>Create Qs and As <small>Create new questions and answers.</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form id="formaddquestion" name="formaddquestion" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{ route('admin/quiz-create') }}">
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
                        <input id="txttitle" name="txttitle" required="required" value="" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Question <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="txtquestion" name="txtquestion" required value="" class="form-control col-md-7 col-xs-12"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Answers <span class="required">*</span>
                    </label>
                    <div id="dynamic-answer-container" name="dynamic-answer-container" class="col-md-6 col-sm-6 col-xs-12">
                        <div id="" name="" class="dynamic-answer" >
                            <div class="col-md-10 col-sm-10 col-xs-11" style="margin-bottom: 5px; padding-left: 0">   
                                <input name="txtanswers[]" required class="form-control col-md-7 col-xs-7"> 
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-1"  style="margin-bottom: 5px;">  
                                <input onclick="clone($(this), {{ App\Setting::where('setting' , 'mcq_answer_count')->first()->data }} ,'dynamic-answer' , 'dynamic-answer-container' )" class="btn-add-question btn" type="button" value="+">
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-1"  style="margin-bottom: 5px;">  
                                <input onclick="remove($(this) ,'dynamic-answer')" class="btn-add-question btn" type="button" value="-">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtname"> Answer Index <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="txtanswer" name="txtanswer" max="5" min="1"  required class="form-control col-md-7 col-xs-12">
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
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_content">
            <div class="table-responsive">
                <!--<table id="jstable" name="jstable" class="table table-striped jambo_table bulk_action">-->
                <table id="jstable" name="jstable" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr class="headings">
                            <th class="column-title" style="display: table-cell;">No</th>
                            <th class="column-title" style="display: table-cell;">Date</th>
                            <th class="column-title" style="display: table-cell;">Question Title</th>
                            <th class="column-title no-link last" style="display: table-cell;"><span class="nobr">Action</span></th>
                            <th class="bulk-actions" style="display: none;">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt">1 Records Selected</span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (App\Question::get() as $question){
                            ?>
                            <tr class="even pointer">
                                <td class=""><?php echo $question->id ?></td>
                                <td class=""><?php echo $question->created_at->format('Y-m-d') ?></td>
                                <td class=""><?php echo $question->title ?></td>
                                <td class="last">
                                    <a href="{{ action('Admin\QuizController@edit', $question->id ) }}">
                                        <span class="label label-primary">Edit</span>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection