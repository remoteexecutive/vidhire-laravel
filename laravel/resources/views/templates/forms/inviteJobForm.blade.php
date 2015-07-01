<form action="" method="post" id="submit_form" class="submit_form main_form job-map-form" novalidate="novalidate">
    {!! csrf_field() !!}
    <label>Select Job</label>
    <input type="hidden" name="resume_id" value="{{$resume_id}}">
    <select class="job" name="job">
            @foreach($job as $jobs)
            <option value="{{$jobs->id}}">{{$jobs->job_title}}</option>
            @endforeach
    </select>
</form>