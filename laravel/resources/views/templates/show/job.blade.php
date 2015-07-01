<div class="container">
    <div class="row">
        <div class="single-job-container col-md-9">
            <div class="apply-for-job-container">
                
                    <input class="btn btn-lg btn-primary apply-for-job pull-right" type="button" value="Apply" />
                
            </div>
            <div class="logo">
                <img width="150" height="150" src="{{$job->logo}}"/>
            </div>
            <div class="title">
                <a href="#" class="job-title">
                    {{$job->job_title}}
                </a>
                <span class="job-type">
                    {{$job->job_type}}
                </span>
            </div>
            <div class="job-details">
                <span class="company">
                    {{$job->company}}
                </span>
                <span class="website">
                    <a href="{{$job->website}}">{{$job->website}}</a>
                </span>
            </div>
            <div class="location">
                {{$job->location}}
            </div>
            <div class="job-description">
                {!! $job->job_description !!}
            </div>
            <div class="job-video-link">
                
                    <iframe height="355" src="{{$job->job_video_link}}"></iframe>

            </div>
        </div>
    </div>
</div>