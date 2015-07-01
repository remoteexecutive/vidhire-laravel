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
                                <div class="col-md-4">
                                    <ul class="list-inline toggle-processing-status">
                                        <li><a href="?fast-track=insufficient&amp;resume_id=57" class="fast-track"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">Fast Tracked</a></li>
                                        <li><a  href="?reference-checked=false&amp;resume_id=57" class="reference-checked"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">References Checked</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-inline toggle-processing-status">
                                        <li><a href="?video-interview-evaluated=false&amp;resume_id=57" class="video-interview-evaluated"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">Video Evaluated</a></li>
                                        <li><a href="?no-red-flags=checking&amp;resume_id=57" class="no-red-flags"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">No Red Flags</a></li>
                                    </ul><!--toggle-processing-status-->
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-inline toggle-processing-status">
                                        <li><a href="?star-resume=unrated&amp;resume_id=57" class="highest-rated"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">Highest Rated</a></li>
                                        <li><a href="?completed-evaluation=false&amp;resume_id=57" class="completed-evaluation"><img class="green-checked" height="16" width="16" src="//vidhire.net/wp-content/themes/vidhire/images/green-check-mark.png">Completed Evaluation</a></li>
                                    </ul><!--toggle-processing-status-->
                                </div>
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

