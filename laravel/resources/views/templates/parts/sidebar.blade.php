@if ($user == 'Employer')
<a href="#" class="btn btn-block jobtc-button submit-job" role="button">Submit a Job</a>
@elseif ($user == 'Jobseeker')
<a href="#" class="btn btn-block jobtc-button edit-resume" role="button">Edit Resume</a>
@endif

<div class="live-resumes">Live Resumes: 6</div>
    

<div data-role="collapsible-set" data-theme="c" data-content-theme="d" data-inset="true">
    <div data-role="collapsible" class="collaps" data-collapsed-icon="plus" data-expanded-icon="minus" data-iconpos="left" data-iconshadow="false">
        	<h2>List 1</h2>

        <ul data-role="listview" data-divider-theme="d">
            <li data-icon="home" data-iconpos="right"><a href="index.html">abc</a>
            </li>
            <li data-icon="heart" data-iconpos="right"><a href="index.html">abc2</a>
            </li>
            <li data-icon="search" data-iconpos="right"><a href="index.html">abc3</a>
            </li>
        </ul>
    </div>
    <div data-role="collapsible" class="collaps" data-collapsed-icon="plus" data-expanded-icon="minus" data-iconpos="left" data-iconshadow="false">
        	<h2>List 1</h2>

        <ul data-role="listview" data-divider-theme="d">
            <li data-icon="home" data-iconpos="right"><a href="index.html">abc</a>
            </li>
            <li data-icon="heart" data-iconpos="right"><a href="index.html">abc2</a>
            </li>
            <li data-icon="search" data-iconpos="right"><a href="index.html">abc3</a>
            </li>
        </ul>
    </div>
</div>Once item expanded at a time
<div data-role="collapsible-set" data-theme="c" data-content-theme="d" data-inset="true">
    <div data-role="collapsible" data-collapsed-icon="plus" data-expanded-icon="minus" data-iconpos="left" data-iconshadow="false">
        	<h2>List 1</h2>

        <ul data-role="listview" data-divider-theme="d">
            <li data-icon="home" data-iconpos="right"><a href="index.html">abc</a>
            </li>
            <li data-icon="heart" data-iconpos="right"><a href="index.html">abc2</a>
            </li>
            <li data-icon="search" data-iconpos="right"><a href="index.html">abc3</a>
            </li>
        </ul>
    </div>
    <div data-role="collapsible" data-collapsed-icon="plus" data-expanded-icon="minus" data-iconpos="left" data-iconshadow="false">
        	<h2>List 1</h2>

        <ul data-role="listview" data-divider-theme="d">
            <li data-icon="home" data-iconpos="right"><a href="index.html">abc</a>
            </li>
            <li data-icon="heart" data-iconpos="right"><a href="index.html">abc2</a>
            </li>
            <li data-icon="search" data-iconpos="right"><a href="index.html">abc3</a>
            </li>
        </ul>
    </div>
</div>    

