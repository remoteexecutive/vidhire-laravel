<?php
/*
 * Employer Dashboard 
 * Updated 4/23/2015
 * */
?>
<div class="section myjobs">

    <div class="section_content">

        <!--Dashboard Tabs-->
        <ul class="nav dashboard-tabs">

            <li id="myjobs_tab_evaluation"><a data-toggle="tab" href="#employer-evaluation" class="active noscroll">Applicants</a></li>
            <li id="myjobs_tab_jobs"><a data-toggle="tab" href="#employer-jobs" class="inactive noscroll">Jobs</a></li>
            <li id="myjobs_tab_applicant_discussions"><a data-toggle="tab" href="#discussions" class="inactive noscroll">Discussions</a></li>
            <li id="myjobs_tab_employer_test"><a data-toggle="tab" href="#employer-test-tab" class="inactive noscroll">Tests</a></li>
            <li id="myjobs_tab_employer_statuses"><a data-toggle="tab" href="#employer-statuses" class="inactive noscroll">Statuses</a></li>
            <li id="myjobs_tab_employer_skills"><a data-toggle="tab" href="#employer-skills" class="inactive noscroll">Skills</a></li>
        </ul>

        <div class="tab-content">

            <div id="employer-statuses" class="tab-pane fade in dashboard-tab-pane">
               
            </div>

            <div id="employer-skills" class="tab-pane fade in dashboard-tab-pane">


            </div>


            <div id="employer-test-tab" class="tab-pane fade in dashboard-tab-pane">
                <div class="space"></div>
                <div class="row create-test-field">
                    <div class="col-md-5">
                        <div class="input-group">
                            <span  class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input class="form-control" placeholder="Search" type="text" value=""/>
                        </div>
                    </div>
                    <div class="col-md-5">

                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-primary create-test">Create Test</a>
                    </div>
                </div>
                <div class="space"></div>
                <!--Test List-->
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">PHP Basic Questions</h3>
                            </div>
                            <div class="test-options">
                                <ul class="nav nav-pills">
                                    <li role="presentation"><a class="edit-test" href="#">Edit</a></li>
                                    <li role="presentation"><a class="preview-test" href="#">Preview</a></li>
                                    <li role="presentation"><a class="delete-test" href="#">Delete</a></li>
                                    <li role="presentation"><a class="duplicate-test" href="#">Duplicate</a></li>
                                    <li role="presentation"><a class="options" href="#">Options</a></li>
                                    <li role="presentation"><a class="add-question" href="#">Add Question</a></li>
                                    <li role="presentation"><a class="link-to-job" href="#">Link to Jobs</a></li>
                                    <li role="presentation"><a class="send-to-applicants" href="#">Send to Applicants</a></li>
                                    <li role="presentation"><a class="change-test-color" href="#">Color</a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <ol class="question-list">
                                    <li>
                                        <label>What is PHP?</label>
                                        <div class="test-options">
                                            <ul class="nav nav-pills">
                                                <li role="presentation"><a href="#">Edit</a></li>
                                                <li role="presentation"><a href="#">Preview</a></li>
                                                <li role="presentation"><a href="#">Delete</a></li>
                                                <li role="presentation"><a href="#">Duplicate</a></li>
                                                <li role="presentation"><a href="#">Options</a></li>
                                            </ul>
                                        </div>

                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <ul class="pager">
                                <li><a href="#">Previous</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <div id="employer-jobs" class="tab-pane fade in dashboard-tab-pane">
                @include('templates.show.listJob')
            </div>

            <div id="discussions" class="tab-pane fade in dashboard-tab-pane">

            </div>

            <div id="employer-evaluation" class="tab-pane fade in active dashboard-tab-pane">
                    @include('templates.show.listResume')
            </div>

        </div>


    </div><!-- end section_content -->

</div><!-- end section -->