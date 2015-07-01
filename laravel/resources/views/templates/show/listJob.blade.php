<ol class="jobs">
            @foreach($job as $jobs)
            <li class="job">
                <input type="hidden" name="job_id" value="{{$jobs->id}}">
                <div class="photo">
                    <a href="#">
                            <img width="97" height="95" src="{{$jobs->logo}}" class="attachment-thumbnail wp-post-image" alt="Company Logo">
                    </a>
                </div>    
                <div class="job-details-title">
                    <div class="title">
                        <strong>
                            <a target="_blank" class="job-title-color" href="">{{$jobs->job_title}}</a>
                        </strong>
                        <span class="jtype full-time">{{$jobs->job_type}}</span>              
                    </div><!--title-->  

                </div> <!--job-details-title-->

                <div class="job-details">
                    <div>
                        <a href="" rel="nofollow"></a>
                        <div class="location">
                            <strong>{{$jobs->location}}</strong>
                        </div>        
                    </div><!--job-details-->

                    <div class="actions">
                        <a class="job-view-link" href="#">View</a>
                        <a class="job-edit-link" href="#">Edit</a>                                        
                        <a class="job-end-link" href="#">End</a>                                        
                    </div>
                </div>

        
                <div class="total_applicants_jobs"><strong>Total Applicants: <span></span></strong></div>                       

            </li>
            @endforeach
</ol>