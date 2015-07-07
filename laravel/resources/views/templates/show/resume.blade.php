

<div class="row">
    <div class="resume-container col-md-12">
        <input type="hidden" name="resume_id" value="{{$resume->id}}" />
        @if(isset($job_id))
        <input type="hidden" name="job_id" value="{{$job_id}}" />
        @else
        <input type="hidden" name="job_id" value="" />
        @endif
        <div class="section_header">                        
            <h1 class="title resume-title">{{$resume->first_name}}&nbsp;{{$resume->last_name}}</h1>
            <div class="space"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="application-job">
                        <div>
                            <div class="resume-pic-container">
                                <div class="space"></div>
                                <img width="150" height="150" src="{{$resume->resume_photo}}" alt="Resume Photo">
                            </div>
                            <div class="space"></div>
                            <ul>
                                <li>
                                    Minimum Hourly Rate: <strong>{{$resume->rate}}&nbsp;{{$resume->currency}}</strong> 
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-information">
                        <div>
                            <div class="space"></div>
                            <ul>
                                <li> 
                                    <i class="fa fa-envelope"></i>
                                    &nbsp;
                                    <strong>
                                        <a href="mailto:{{$resume->email}}?subject=Your Resume on VidHire">{{$resume->email}}</a>
                                    </strong>
                                </li>
                                <li ><i class="fa fa-phone"></i>&nbsp;<strong>{{$resume->phone}}</strong></li>
                                <li ><i class="fa fa-mobile"></i>&nbsp;<strong>{{$resume->mobile}}</strong></li>
                                <li ><i class="fa fa-skype"></i>&nbsp;<a href="skype">{{$resume->skype}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @if($user == 'Employer')
                <div class="col-md-4">
                    <div class="resume-statuses">
                        <ul class="list-group toggle-processing-status" style="font-size: 12px;">
                            <li class="list-group-item">
                                <img class="tracking-img" height="16" width="16" src="{{asset('assets/images/orange-check.png')}}">
                                <a href="#" class="tracking">Standard Tracked</a>
                            </li>
                            <li class="list-group-item">
                                <img class="references-img" height="16" width="16" src="{{asset('assets/images/orange-check.png')}}">
                                <a href="#" class="references">Check Reference</a>    
                            </li>
                            <li class="list-group-item">
                                <img class="rating-img" height="16" width="16" src="{{asset('assets/images/orange-check.png')}}">
                                <a href="#" class="rating">Pick</a>
                            </li>						          
                            <li class="list-group-item">
                                <img class="video-img" height="16" width="16" src="{{asset('assets/images/red-check.gif')}}">
                                <a href="#" class="video">No Video</a>
                            </li>
                            <li class="list-group-item">
                                <img class="flags-img" height="16" width="16" src="{{asset('assets/images/red-check.gif')}}">
                                <a href="#" class="flags">Check For Red Flags</a>
                            </li>
                            <li class="list-group-item">
                                <img class="evaluation-img" height="16" width="16" src="{{asset('assets/images/orange-check.png')}}">
                                <a href="#" class="evaluation">Evaluate</a>
                            </li>
                        </ul><!--toggle-processing-status-->
                        <script type='text/javascript'>
                            /*
                             * For Toggling resume statuses
                             **/
                            $(".toggle-processing-status li a").click(function () {
                                var resume_id = $(".resume-container input[name=resume_id]").val();
                                var job_id = $(".resume-container input[name=job_id]").val();
                                var ajaxurl = '/toggle-resume-status';


                                if ($(this).attr('class') === 'tracking') {
                                    //$(this).text($(this).text() == 'Standard Tracked' ? 'Fast Tracked' : 'Standard Tracked');
                                    
                                     switch ($(this).text()) {
                                        case 'Standard Tracked' :
                                            $(this).text('Fast Tracked');
                                            $('.tracking-img').attr('src','/assets/images/green-check.png');
                                            break;
                                        default:
                                            $(this).text('Standard Tracked');
                                            $('.tracking-img').attr('src','/assets/images/orange-check.png');
                                            break;

                                    }
                                }

                                if ($(this).attr('class') === 'references') {
                                    //$(this).text($(this).text() == 'Check Reference' ? 'References Checked' : 'Check Reference');
                                    
                                     switch ($(this).text()) {
                                        case 'Check Reference' :
                                            $(this).text('References Checked');
                                            $('.references-img').attr('src','/assets/images/green-check.png');
                                            break;
                                        default:
                                            $(this).text('Check Reference');
                                            $('.references-img').attr('src','/assets/images/orange-check.png');
                                            break;

                                    }
                                }

                                if ($(this).attr('class') === 'rating') {
                                    //$(this).text($(this).text() == 'Pick' ? '2nd Highest Rated' : 'Highest Rated');

                                    switch ($(this).text()) {
                                        case 'Pick' :
                                            $(this).text('2nd Highest Rated');
                                            $('.rating-img').attr('src','/assets/images/green-check.png');
                                            break;
                                        case '2nd Highest Rated' :
                                            $(this).text('Highest Rated');
                                            $('.rating-img').attr('src','/assets/images/green-check.png');
                                            break;
                                        default:
                                            $(this).text('Pick');
                                            $('.rating-img').attr('src','/assets/images/orange-check.png');
                                            break;

                                    }

                                    //BootstrapDialog.alert($(this).text());
                                }

                                if ($(this).attr('class') === 'video') {

                                    switch ($(this).text()) {
                                        case 'No Video' :
                                            $(this).text('Video Submitted');
                                            $('.video-img').attr('src','/assets/images/orange-check.png');
                                            break;
                                        case 'Video Submitted' :
                                            $(this).text('Video Evaluated');
                                            $('.video-img').attr('src','/assets/images/green-check.png');
                                            break;
                                        default:
                                            $(this).text('No Video');
                                            $('.video-img').attr('src','/assets/images/red-check.gif');
                                            break;
                                    }
                                }
                                
                                if ($(this).attr('class') === 'flags') {
                                    
                                    switch($(this).text()) {
                                        case 'Check For Red Flags' :
                                            $(this).text('Red Flagged');
                                            $('.flags-img').attr('src','/assets/images/red-check.gif');
                                         break;
                                     case 'Red Flagged' :
                                         $(this).text('No Red Flags');
                                         $('.flags-img').attr('src','/assets/images/green-check.png');
                                         break;
                                    default: $(this).text('Check For Red Flags');
                                        $('.flags-img').attr('src','/assets/images/orange-check.png');
                                        break;
                                }
                            }
                            
                             if ($(this).attr('class') === 'evaluation') {
                                    
                                    switch($(this).text()) {
                                        case 'Evaluate' :
                                            $(this).text('Completed Evaluation');
                                            $('.evaluation-img').attr('src','/assets/images/green-check.png');
                                         break;
                                     case 'Completed Evaluation' :
                                         $(this).text('Hired');
                                         $('.evaluation-img').attr('src','/assets/images/green-check.png');
                                         break;
                                    default: $(this).text('Evaluate');
                                        $('.evaluation-img').attr('src','/assets/images/orange-check.png');
                                        break;
                                }
                            }


                            });
                        
                        
                        
                        </script>
                    </div>
                </div>
                @endif
            </div> <!--First Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="attached_documents">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="ead-document">
                                    @if($resume->resume_doc != '')
                                    <!--iframe src="{{$resume->resume_doc}}"></iframe-->
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--Third Row-->
            <div class="space"></div>
            <div class="row">
                <div class="col-md-7">
                    <div class="degree-section">
                        <div class="degree-section-text-section">
                            <div class="su-box-title"><i class="fa fa-graduation-cap"></i>&nbsp;Certificate, Diploma or Degree</div>
                            <div class="su-box-content">
                                <div class="space"></div>
                                <ul>
                                    <li>{{$resume->degree}}</li>
                                </ul>
                                <ul>
                                    <li>
                                        <label>Last year's overall average: </label>
                                        {{$resume->overall_average}}
                                    </li>
                                    <li>
                                        @if($resume->transcripts == 'Yes')
                                        <label>Transcripts:</label>Yes
                                        @else
                                        <label>Transcripts:</label>No
                                        @endif
                                    </li>
                                </ul>

                                <a href="{{$resume->additional_doc}}" target="_blank">
                                    <img width="150" height="150" src="{{$resume->additional_doc}}" class="attachment-thumbnail" alt="">
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="skills-container">
                        <div class="skills-text">
                            <div class="su-box-title"><i class="fa fa-wrench"></i>&nbsp;Skills</div>
                            <div class="su-box-content">
                                {{$resume->skills}}
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!--Second Row-->
            <div class="space"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="experience">
                        <div class="su-box-title"><i class="fa fa-sitemap"></i>&nbsp;Career Map</div>
                        <div class="su-box-content su-clearfix">
                            <div class="space"></div>
                            <div class="row">
                                <div class="col-md-3 hidden-xs">
                                    <ul class="list-group">
                                        <li class="list-group-item">&nbsp;</li>
                                        <li class="list-group-item">Position/Title</li>
                                        <li class="list-group-item">Start Date</li>
                                        <li class="list-group-item">End Date</li>
                                        <li class="list-group-item">Job Type</li>
                                        <li class="list-group-item">Company</li>
                                        <li class="list-group-item">City</li>
                                        <li class="list-group-item">Country</li>
                                        <li class="list-group-item">Reason for Leaving</li>
                                        <li class="list-group-item">Starting Salary</li>
                                        <li class="list-group-item">Final Salary</li>
                                        <li class="list-group-item">Salary Type</li>
                                        <li class="list-group-item">Reference Name</li>
                                        <li class="list-group-item">Position/Title</li>
                                        <li class="list-group-item">Reference Email</li>
                                        <li class="list-group-item">Reference Phone</li>
                                        <li class="list-group-item">Notes</li>
                                    </ul>
                                </div>
                                @foreach($career_map as $map)
                                <div class="col-md-3">
                                    <ul class="list-group">
                                        <li class="list-group-item">{{$map->employment}}</li>
                                        <li class="list-group-item">{{$map->position}}</li>
                                        <li class="list-group-item">{{$map->start_date}}</li>
                                        <li class="list-group-item">{{$map->end_date}}</li>
                                        <li class="list-group-item">{{$map->job_type}}</li>
                                        <li class="list-group-item">{{$map->company}}</li>
                                        <li class="list-group-item">{{$map->city}}</li>
                                        <li class="list-group-item">{{$map->country}}</li>
                                        <li class="list-group-item">{{$map->reason_for_leaving}}</li>
                                        <li class="list-group-item">{{$map->starting_salary}}&nbsp;{{$resume->currency}}</li>
                                        <li class="list-group-item">{{$map->final_salary}}&nbsp;{{$resume->currency}}</li>
                                        <li class="list-group-item">{{$map->salary_type}}</li>
                                        <li class="list-group-item">{{$map->reference_name}}</li>
                                        <li class="list-group-item">{{$map->reference_position}}</li>
                                        <li class="list-group-item">{{$map->reference_email}}</li>
                                        <li class="list-group-item">{{$map->reference_phone_number}}</li>
                                        <li class="list-group-item">{{$map->notes}}</li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--Fourth Row-->
            <div class="space"></div>
            @if($user == 'Employer') 
            <div class="row">
                <div class="col-md-6">
                    <div class="experience-chart">
                        <div class="su-box-title"><i class="fa fa-edit"></i>&nbsp;Employment Period Evaluation</div>
                        <div class="su-box-content">
                            <div class="space"></div>
                            <label>Most Recent Employment</label>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                            <label>Second Last Employment</label>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                            <label>Third Last Employment</label>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wage-history-evaluation">            
                        <div class="su-box-title" ><i class="fa fa-usd"></i>&nbsp;Wage History Evaluation</div>
                        <div class="su-box-content">
                            <div class="space"></div>
                            <label>Most Recent Employment</label>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                            <label>Second Last Employment</label>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                            <label>Third Last Employment</label>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--Fifth Row-->
            <div class="space"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="reference-request-responses">

                        <div class="su-box-title"><i class="fa fa-tachometer container-icon"></i>&nbsp;Reference Request Responses</div>
                        <div class="su-box-content">
                            <div class="space"></div>
                            <h2>Productivity</h2>
                            <div class="sue-progress-bar sue-progress-bar-style-thin" style="background-color:#f0dbc9;border-color:#d8c5b5" data-percent="80"><span style="width: 80%; color: rgb(0, 0, 0); background-color: rgb(130, 0, 99);"><span><strong>Steven Jones</strong>  (Very Good)</span></span></div>
                            <div class="sue-progress-bar sue-progress-bar-style-thin" style="background-color:#f0dbc9;border-color:#d8c5b5" data-percent="60"><span style="width: 60%; color: rgb(0, 0, 0); background-color: rgb(4, 0, 130);"><span><strong>John Horvath</strong>  (Good)</span></span></div>
                            <div class="sue-progress-bar sue-progress-bar-style-thin" style="background-color:#f0dbc9;border-color:#d8c5b5" data-percent="40"><span style="width: 40%; color: rgb(0, 0, 0); background-color: rgb(102, 191, 4);"><span><strong>Nancy Drew</strong>  (Fair)</span></span></div>


                            <h3 style="text-align: center;"><span style="color: #919182;">Average</span></h3>
                            <div class="sue-progress-pie sue-progress-pie-align-center" style="width:80px;height:80px" data-percent="60" data-size="80" data-pie_width="40" data-pie_color="#f0dbc9" data-fill_color="#E68A8A">
                                <canvas width="80" height="80" style="width: 80px; height: 80px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--Sixth Row-->

            <div class="space"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="interview-video-container">
                        <div class="video-interview-header"><i class="fa fa-file-video-o"></i>&nbsp;Video Interview</div>
                        <div class="su-box-content su-clearfix">

                            <iframe height="355" src=""></iframe>

                        </div>
                    </div>
                </div>
            </div><!--Seventh Row-->
            <div class="space"></div>
            @endif
            @if($user == 'Employer')
            <div class="row">
                <div class="col-md-12">
                    <div class="video-evaluation-container">
                        <div class="su-box-title"><i class="fa fa-laptop container-icon"></i>&nbsp;Video Evaluation</div>

                        <div class="su-box-content su-clearfix">
                            <div class="space"></div>
                            <div class="row">
                                <div class="col-md-offset-2">
                                    <div class="video-evaluation-form-container">
                                        <form class="video-evaluation-form">
                                            <table class="video-evaluation">
                                                <thead>
                                                    <tr><th>&nbsp;</th>
                                                        <th>Evaluation Notes</th>
                                                        <th>Evaluator</th>
                                                        <th>Score</th>
                                                    </tr></thead>      
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Confidence</strong></td>
                                                        <td>
                                                            <textarea name="confidence_notes">Test</textarea>
                                                        </td>
                                                        <td><input type="text" name="confidence_evaluator" value="Test "></td>
                                                        <td>
                                                            <select name="confidence_score">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option selected="selected">3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Communication</strong></td>
                                                        <td>
                                                            <textarea name="communication_notes">Test</textarea>
                                                        </td>
                                                        <td><input type="text" name="communication_evaluator" value="Test"></td>
                                                        <td>
                                                            <select name="communication_score">
                                                                <option selected="selected">1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Enthusiasm</strong></td>
                                                        <td>
                                                            <textarea name="fun_factor_notes">Test</textarea>
                                                        </td>
                                                        <td><input type="text" name="fun_factor_evaluator" value="Test"></td>
                                                        <td>
                                                            <select name="fun_factor_score">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option selected="selected">3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Connection</strong></td>
                                                        <td>
                                                            <textarea name="connection_notes">Test</textarea></td>
                                                        <td><input type="text" name="connection_evaluator" value="Test"></td>
                                                        <td>
                                                            <select name="connection_score">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option selected="selected">3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Understanding</strong></td>
                                                        <td><textarea name="understanding_notes">Test</textarea></td>
                                                        <td><input type="text" name="understanding_evaluator" value="Test"></td>
                                                        <td>
                                                            <select name="understanding_score">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option selected="selected">4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Optional Boost</strong></td>
                                                        <td><textarea name="bonus_notes">Test</textarea></td>
                                                        <td><input type="text" name="bonus_evaluator" value="Test"></td>
                                                        <td>
                                                            <select name="bonus_score">
                                                                <option>1</option>
                                                                <option selected="selected">2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td><strong style="float:right;font-weight:bolder;font-size:20px;color:#a9a9a9;">Total</strong></td>
                                                        <td><input id="video_evaluation_score" name="video_evaluation_score" type="text" value="16"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <div class="evaluation-action-buttons">                      
                                                                <input type="button" id="save_video_score" name="save_video_score" class="save_video_score" value="Save And Calculate">
                                                                <br>
                                                                <br>
                                                                <a target="_blank" class="evaluation-instructions" href="http://vidhire.net/?p=329">Evaluation Instructions</a>
                                                                <input name="resume_id" type="hidden" value="57">	  
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>  
                                            </table>
                                        </form>         
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <label>Confidence</label>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                    <label>Communication</label>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                    <label>Enthusiasm</label>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--Eighth Row-->
            <div class="space"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="final-evaluation-form">
                        <div class="su-box-title"><i class="fa fa-bar-chart-o container-icon"></i>&nbsp;Final Evaluation</div>
                        <div class="su-box-content su-clearfix">
                            <div class="space"></div>
                            <div class="row">
                                <div class="col-md-offset-2">
                                    <form class="final-evaluation-form">       
                                        <table class="final-evaluation">
                                            <thead>
                                                <tr><th>&nbsp;</th>
                                                    <th>Evaluation Notes</th>
                                                    <th>Evaluator</th>
                                                    <th>Score</th>
                                                </tr></thead>      
                                            <tbody>
                                                <tr>
                                                    <td><strong>Skills</strong></td>
                                                    <td>
                                                        <textarea name="skills_notes">1 is skills sufficient for the job, 2 3 and 4 is more than is needed. 5 is diverse skills with high proficiency.</textarea>
                                                    </td>
                                                    <td><input type="text" name="skills_evaluator" value="Tom Coghill"></td>
                                                    <td>
                                                        <select name="skills_score">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option selected="selected">4</option>
                                                            <option>5</option>
                                                        </select>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><strong>Education</strong></td>
                                                    <td>
                                                        <textarea name="education_notes"> Top performers have high marks,                                                                                            		              		              		              		              		              		</textarea>
                                                    </td>
                                                    <td><input type="text" name="education_evaluator" value="Tom Coghill"></td>
                                                    <td>
                                                        <select name="education_score">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option selected="selected">5</option>
                                                        </select>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><strong>Career Map</strong></td>
                                                    <td>
                                                        <textarea name="career_map_notes">This is the way that I am fixing                                                                                                                                                                                                                               </textarea>
                                                    </td>
                                                    <td><input type="text" name="career_map_evaluator" value="Jex B."></td>
                                                    <td>
                                                        <select name="career_map_score">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option selected="selected">4</option>
                                                            <option>5</option>
                                                        </select>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><strong>References</strong></td>
                                                    <td>
                                                        <textarea name="references_notes">This is the way to post a letter.         	              	              	              	              	              	              		                                                                                                                         </textarea>				 </td>
                                                    <td><input type="text" name="references_evaluator" value="Nam"></td>
                                                    <td>
                                                        <select name="references_score">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option selected="selected">5</option>
                                                        </select>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><strong>Video Interview</strong></td>
                                                    <td><textarea name="video_interview_notes">Confidence, clear effective communication, good impression, warm personality.                                                                                                                          </textarea></td>
                                                    <td><input type="text" name="video_interview_evaluator" value="Tom C         "></td>
                                                    <td>
                                                        <select name="video_interview_score">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option selected="selected">3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><strong>Tests</strong></td>
                                                    <td><textarea name="tests_notes">These may be program skill tests, or typing, memory or anything required for determining job competancy.                                                                                               </textarea></td>
                                                    <td><input type="text" name="tests_evaluator" value="Henry D."></td>
                                                    <td>
                                                        <select name="tests_score">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option selected="selected">3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                                    </td>
                                                </tr>	

                                                <tr>
                                                    <td><strong>Optional Boost</strong></td>
                                                    <td><textarea name="positive_adjustments_notes">I gave the boost because he has the highest PHP experience.</textarea></td>
                                                    <td><input type="text" name="positive_adjustments_evaluator" value="Paige"></td>
                                                    <td>
                                                        <select name="positive_adjustments_score">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option selected="selected">4</option>
                                                            <option>5</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Admin Notes</strong></td>
                                                    <td><textarea name="internal-notes-text-area" class="internal-notes-text-area">He has all the skills and his experience matches the job. The video interview showed clear communication, quick thinking and confidence. &nbsp;He was fast tracked as he showed upward mobility within 3 companies.                                                </textarea></td>
                                                    <td><strong style="float:right;font-weight:bolder;font-size:20px;color:#1F5802;">Total</strong></td>
                                                    <td><input id="final_evaluation_score" name="final_evaluation_score" type="text" value="28"></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <div class="evaluation-action-buttons">                      
                                                            <input type="button" id="save_score" name="save_score" class="save_score" value="Save And Calculate">
                                                            <br>
                                                            <br>
                                                            <a target="_blank" class="evaluation-instructions" href="http://vidhire.net/?p=329">Evaluation Instructions</a>
                                                            <input name="resume_id" type="hidden" value="57">	  
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>  
                                        </table>    
                                    </form>         
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="final-evaluation-form">
                                        <label>Skills</label>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                        <label>Education</label>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                        <label>Career Map</label>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--Ninth Row-->
            <div class="space"></div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <div class="su-box-title"><i class="fa fa-location-arrow"></i>&nbsp;Location: {{$resume->location}}</div>
                        <div class="su-box-content su-clearfix">                                    
                            <div id="geolocation_box">
                                <p>
                                    <input type="hidden" class="text" name="location" id="geolocation-address" value="{{ $resume->location }}">
                                    <input type="hidden" class="text" name="latlng" id="geolocation-latLng" value="{{ $resume->latlng }}">
                                </p>

                                <div id="googleMapResume" style="width:100%;height:250px;"><div id="geolocation-map" style="width: 100%; height: 250px; position: relative; overflow: hidden; transform: translateZ(0px); background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;"><div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0; cursor: url(http://maps.gstatic.com/mapfiles/openhand_8_8.cur) 8 8, default;"><div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; transform-origin: 601px 116px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: visible;"><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -25px; top: -186px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -25px; top: 70px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 231px; top: -186px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 231px; top: 70px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -281px; top: -186px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -281px; top: 70px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 487px; top: -186px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 487px; top: 70px;"></div></div></div></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: visible;"><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -25px; top: -186px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -25px; top: 70px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 231px; top: -186px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 231px; top: 70px;"><canvas draggable="false" height="256" width="256" style="-webkit-user-select: none; position: absolute; left: 0px; top: 0px; height: 256px; width: 256px;"></canvas></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -281px; top: -186px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -281px; top: 70px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 487px; top: -186px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 487px; top: 70px;"></div></div></div></div><div style="position: absolute; z-index: 0; left: 0px; top: 0px;"><div style="overflow: hidden; width: 646px; height: 250px;"><img src="http://maps.googleapis.com/maps/api/js/StaticMapService.GetMapImage?1m2&amp;1i17945&amp;2i23738&amp;2e1&amp;3u8&amp;4m2&amp;1u646&amp;2u250&amp;5m5&amp;1e0&amp;5sen&amp;6sus&amp;10b1&amp;12b1&amp;token=97428" style="width: 646px; height: 250px;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: visible;"><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -281px; top: -186px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i8!2i69!3i92!2m3!1e0!2sm!3i298163478!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -281px; top: 70px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i8!2i69!3i93!2m3!1e0!2sm!3i298163478!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 231px; top: 70px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i8!2i71!3i93!2m3!1e0!2sm!3i298163478!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 231px; top: -186px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i8!2i71!3i92!2m3!1e0!2sm!3i298163478!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 487px; top: -186px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i8!2i72!3i92!2m3!1e0!2sm!3i298157716!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -25px; top: -186px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i8!2i70!3i92!2m3!1e0!2sm!3i298163478!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -25px; top: 70px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i8!2i70!3i93!2m3!1e0!2sm!3i298163478!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 487px; top: 70px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i8!2i72!3i93!2m3!1e0!2sm!3i298157716!3m9!2sen!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; transform: translateZ(0px) translateZ(0px);"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%; transform-origin: 601px 116px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" href="http://maps.google.com/maps?ll=43.871475,-79.649718&amp;z=8&amp;t=m&amp;hl=en&amp;gl=US&amp;mapclient=apiv3" title="Click to see this area on Google Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 62px; height: 26px; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/google_white2.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 62px; height: 26px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 161px; bottom: 0px; width: 121px;"><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Map Data</a><span>Map data ©2015 Google</span></div></div></div><div style="padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); -webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 173px; top: 35px; background-color: white;"><div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div><div style="font-size: 13px;">Map data ©2015 Google</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt3.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2015 Google</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; position: absolute; -webkit-user-select: none; right: 92px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a href="http://www.google.com/intl/en_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a></div></div><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a target="_new" title="Report errors in the road map or imagery to Google" href="https://www.google.com/maps/@43.8714749,-79.649718,8z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Report a map error</a></div></div><div class="gmnoprint" draggable="false" controlwidth="32" controlheight="84" style="margin: 5px; -webkit-user-select: none; position: absolute; left: 0px; top: 0px;"><div controlwidth="32" controlheight="40" style="cursor: url(http://maps.gstatic.com/mapfiles/openhand_8_8.cur) 8 8, default; position: absolute; left: 0px; top: 0px;"><div aria-label="Street View Pegman Control" style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout2.png" draggable="false" style="position: absolute; left: -9px; top: -102px; width: 1028px; height: 214px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div aria-label="Pegman is disabled" style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout2.png" draggable="false" style="position: absolute; left: -107px; top: -102px; width: 1028px; height: 214px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div aria-label="Pegman is on top of the Map" style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout2.png" draggable="false" style="position: absolute; left: -58px; top: -102px; width: 1028px; height: 214px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div aria-label="Street View Pegman Control" style="width: 32px; height: 40px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout2.png" draggable="false" style="position: absolute; left: -205px; top: -102px; width: 1028px; height: 214px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></div><div class="gmnoprint" controlwidth="0" controlheight="0" style="opacity: 0.6; display: none; position: absolute;"><div title="Rotate map 90 degrees" style="width: 22px; height: 22px; overflow: hidden; position: absolute; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt3.png" draggable="false" style="position: absolute; left: -38px; top: -360px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></div><div class="gmnoprint" controlwidth="20" controlheight="39" style="position: absolute; left: 6px; top: 45px;"><div style="width: 20px; height: 39px; overflow: hidden; position: absolute;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt3.png" draggable="false" style="position: absolute; left: -39px; top: -401px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div title="Zoom in" style="position: absolute; left: 0px; top: 2px; width: 20px; height: 17px; cursor: pointer;"></div><div title="Zoom out" style="position: absolute; left: 0px; top: 19px; width: 20px; height: 17px; cursor: pointer;"></div></div></div><div class="gmnoprint" style="margin: 5px; z-index: 0; position: absolute; cursor: pointer; right: 0px; top: 0px;"><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Show street map" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 1px 6px; border-bottom-left-radius: 2px; border-top-left-radius: 2px; -webkit-background-clip: padding-box; border: 1px solid rgba(0, 0, 0, 0.14902); -webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; min-width: 22px; font-weight: 500; background-color: rgb(255, 255, 255); background-clip: padding-box;">Map</div><div style="z-index: -1; padding-top: 2px; -webkit-background-clip: padding-box; border-width: 0px 1px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-color: rgba(0, 0, 0, 0.14902); border-bottom-color: rgba(0, 0, 0, 0.14902); border-left-color: rgba(0, 0, 0, 0.14902); -webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; left: 0px; top: 18px; text-align: left; display: none; background-color: white; background-clip: padding-box;"><div draggable="false" title="Show street map with terrain" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 3px 8px 3px 3px; direction: ltr; text-align: left; white-space: nowrap; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img src="http://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Terrain</label></div></div></div><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Show satellite imagery" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(86, 86, 86); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 1px 6px; border-bottom-right-radius: 2px; border-top-right-radius: 2px; -webkit-background-clip: padding-box; border-width: 1px 1px 1px 0px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-top-color: rgba(0, 0, 0, 0.14902); border-right-color: rgba(0, 0, 0, 0.14902); border-bottom-color: rgba(0, 0, 0, 0.14902); -webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; min-width: 38px; background-color: rgb(255, 255, 255); background-clip: padding-box;">Satellite</div><div style="z-index: -1; padding-top: 2px; -webkit-background-clip: padding-box; border-width: 0px 1px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-color: rgba(0, 0, 0, 0.14902); border-bottom-color: rgba(0, 0, 0, 0.14902); border-left-color: rgba(0, 0, 0, 0.14902); -webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; right: 0px; top: 17px; text-align: left; display: none; background-color: white; background-clip: padding-box;"><div draggable="false" title="Zoom in to show 45 degree view" style="color: rgb(184, 184, 184); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 3px 8px 3px 3px; direction: ltr; text-align: left; white-space: nowrap; display: none; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(241, 241, 241); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img src="http://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">45°</label></div><div draggable="false" title="Show imagery with street names" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 3px 8px 3px 3px; direction: ltr; text-align: left; white-space: nowrap; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden;"><img src="http://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Labels</label></div></div></div></div></div></div></div>
                            </div>
                            <script type="text/javascript">
                                //For Google Maps
                                var geocoder;
                                var map;
                                function initialize() {
                                    geocoder = new google.maps.Geocoder();
                                    raw_address = document.getElementById('geolocation-latLng').value;
                                    address = raw_address.split(',');
                                    var latlng = new google.maps.LatLng(address[0], address[1]);
                                    var mapOptions = {
                                        zoom: 9,
                                        center: latlng,
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    };
                                    map = new google.maps.Map(document.getElementById("googleMapResume"), mapOptions);
                                    var marker = new google.maps.Marker({
                                        map: map,
                                        position: latlng
                                    });
                                }
                                google.maps.event.addDomListener(window, 'load', initialize);

                            </script>

                        </div>
                    </div>
                </div>
            </div><!--Tenth Row-->
            <div class="space"></div>
            <div class="posted-by-container">Posted by: <strong>testemployee</strong> on October 28, 2014</div>
            <div class="space"></div>
            @if($user == 'Jobseeker') 
            <input class="btn btn-primary edit-resume" type="button" value="Edit Resume" />
            @endif
        </div>
    </div>
</div>
