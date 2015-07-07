<ol class="resumes">

    @foreach($resume as $resumes)
    <li class="resume">
        <input type="hidden" name="resume_id" value="{{$resumes->id}}">
        {!! csrf_field() !!}
        <div class="row">
            <div class="column-md-3 col-sm-3 col-xs-12 ">
                <div class="photo">
                    <a href="#">

                        <img width="97" height="95" src="{{$resumes->resume_photo}}" class="attachment-thumbnail wp-post-image" alt="man 3">

                    </a>
                </div>    
            </div>
            <div class="column-md-9 hidden-xs">
                <div class="container">
                    <strong><a target="_blank" href="#">{{$resumes->first_name}}&nbsp;{{$resumes->last_name}}</a></strong>             

                    <div class="location">
                        {{$resumes->location}}
                    </div>
                    @if($job_map['count'] != 0 && $job_map['resume_id'] == $resumes->id)
                    <div class="applying-for">  
                        Applying for: 
                        <a target="_blank" class="job_applying_for_link" href="#">{{$job_map['job_name']}}</a>
                        <input type="hidden" name="resume_job_id" value="{{$job_map['job_id']}}">
                        <br>
                        <span class="resume_date">Submitted: 28 Oct,&nbsp;
                            <span class="resume_year">2014</span>
                        </span>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-md-offset-3">
                <div class="row hidden-sm hidden-xs">
                    @if($resumes->id == $resume_statuses['resume_id'])
                    <div class="col-md-4">
                        <ul class="list-group toggle-processing-status">
                            <li>
                                <img class="tracking-img" height="16" width="16" src="{{asset('assets/images/orange-check.png')}}">
                                <a href="#" class="tracking">{{$resume_statuses['tracking']}}</a>
                            </li>
                            <li>
                                <img class="references-img" height="16" width="16" src="{{asset('assets/images/orange-check.png')}}">
                                <a href="#" class="references">{{$resume_statuses['references']}}</a>    
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-group toggle-processing-status">
                            <li>
                                <img class="flags-img" height="16" width="16" src="{{asset('assets/images/red-check.gif')}}">
                                <a href="#" class="flags">{{$resume_statuses['flags']}}</a>
                            </li>
                            <li>
                                <img class="evaluation-img" height="16" width="16" src="{{asset('assets/images/orange-check.png')}}">
                                <a href="#" class="evaluation">{{$resume_statuses['evaluation']}}</a>
                            </li>
                        </ul><!--toggle-processing-status-->
                    </div>
                    <div class="col-md-4">
                        <ul class="list-group toggle-processing-status">
                            <li>
                                <img class="rating-img" height="16" width="16" src="{{asset('assets/images/orange-check.png')}}">
                                <a href="#" class="rating">{{$resume_statuses['rating']}}</a>
                            </li>						          
                            <li>
                                <img class="video-img" height="16" width="16" src="{{asset('assets/images/red-check.gif')}}">
                                <a href="#" class="video">{{$resume_statuses['video_interview']}}</a>
                            </li>
                        </ul><!--toggle-processing-status-->
                    </div>
                    @endif
                </div>
                <div class="row hidden-md hidden-lg">
                    <div class="col-xs-12">
                        <ul class="list-inline toggle-processing-status">
                            <li><a href="#" class="fast-track"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">Fast Tracked</a></li>
                            <li><a  href="#" class="reference-checked"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">References Checked</a></li>
                            <li><a href="#" class="video-interview-evaluated"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">Video Evaluated</a></li>
                            <li><a href="#" class="no-red-flags"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">No Red Flags</a></li>
                            <li><a href="#" class="highest-rated"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">Highest Rated</a></li>
                            <li><a href="#" class="completed-evaluation"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">Completed Evaluation</a></li>
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="space"></div>
        <div class="row">
            <div class="col-md-9 col-md-offset-3">
                <input type="button" class="btn btn-primary resume-view-link" value="View Resume" />
                @if($job_map['count'] != 0 && $job_map['resume_id'] == $resumes->id)
                <input type="button" class="btn btn-danger unlink-job-from-user" value="Unlink From Job" />
                @else                            
                <input type="button" class="btn btn-success invite-to-job" value="Invite to Job" />
                @endif
            </div>
        </div>
        <div class="space"></div>
    </li>
    @endforeach
</ol>

