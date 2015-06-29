@if ($user == 'Employer')
<a href="#" class="btn btn-block jobtc-button edit-job" role="button">Submit a Job</a>
@elseif ($user == 'Jobseeker')
<a href="#" class="btn btn-block jobtc-button edit-resume" role="button">Edit Resume</a>
@endif

<div class="live-resumes">Live Resumes: 6</div>
    
<ul class="list-group accordion-notes">
  <li><div class="list-group-item" contenteditable="true"></div></li>
  <li><div class="list-group-item" contenteditable="true"></div></li>
  <li><div class="list-group-item" contenteditable="true"></div></li>
  <li><div class="list-group-item" contenteditable="true"></div></li>
  <li><div class="list-group-item" contenteditable="true"></div></li>
</ul>
    

