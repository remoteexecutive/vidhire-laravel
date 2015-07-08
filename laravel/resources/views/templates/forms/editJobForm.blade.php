<form method="post" enctype="multipart/form-data" id="submit_form" class="submit_form main_form edit-job-form" novalidate="novalidate">  

    {!! csrf_field() !!}

    <input type="hidden" name="job_id" value="">
    <fieldset> 
        <p class="optional"><label for="company-logo">Logo (.jpg, .gif or .png)</label>
            <input type="file" class="text" name="logo" id="company-logo">
        </p>
        <p class="optional">
            <label for="your_name">Your Name/Company Name</label> 
            @if(isset($job->company))
            <input type="text" class="text" name="company" id="your_name" value="{{$job->company or ''}}">
            @else
            <input type="text" class="text" name="company" id="your_name" value="">
            @endif
        </p>
        <p class="optional">
            <label for="website">Website</label> 
            @if(isset($job->website))
            <input type="text" class="text" name="website" value="{{$job->website or ''}}" placeholder="http://" id="website">
            @else
            <input type="text" class="text" name="website" value="" placeholder="http://" id="website">
            @endif
        </p>
    </fieldset>
    <fieldset>
        <p>
            <label for="job_term_cat">Job Title<span title="required">*</span></label>
            @if(isset($job->job_title))
            <input type="text" name="job_title" id="job_term_cat" class="job_term_cat text valid" value="{{$job->job_title or ''}}"> 
            @else
            <input type="text" name="job_title" id="job_term_cat" class="job_term_cat text valid" value=""> 
            @endif
        </p>

        <p><label for="job_type">Job type <span title="required">*</span></label>
            <select name="job_type" id="job_type" class="required">
                <option>Freelance</option>
                <option>Full-Time</option>
                <option>Internship</option>
                <option>Part-Time</option>
                <option>Temporary</option>
            </select>
        </p>

        <p class="optional">
            <label for="job_category">Job Category (comma separated)</label> 
            @if(isset($job->job_category))
            <input type="text" class="text" name="job_category" value="{{$job->job_category or ''}}" id="">
            @else
            <input type="text" class="text" name="job_category" value="" id="">
            @endif
            </p>
    </fieldset>

    <fieldset>
        <legend>Job Location</legend>
        <p>Leave blank if the location of the applicant does not matter e.g. the job involves working from home.</p>
        <div id="geolocation_box">
            <p>
                <label>
                    <input id="geolocation-load" type="button" class="button geolocationadd submit" onclick="javascript:codeAddress();" value="Find Address/Location">
                </label>
                @if(isset($job->location))
                <input type="text" class="text" name="location" id="geolocation-address" value="{{$job->location or ''}}">
                @else
                <input type="text" class="text" name="location" id="geolocation-address" value="">
                @endif
                <input type="hidden" class="text" name="latlng" id="geolocation-latLng" value="">
            </p>
        </div>
        <div id="googleMap" style="width:100%;height:380px;"></div>
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

                map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

                var marker = new google.maps.Marker({
                    map: map,
                    position: latlng
                });

            }

            function codeAddress() {
                var address = document.getElementById('geolocation-address').value;
                geocoder.geocode({'address': address}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });

                        var elem = document.getElementById('geolocation-latLng');
                        elem.value = results[0].geometry.location;
                        elem.value = elem.value.replace(/"/g, "").replace(/'/g, "").replace(/\(|\)/g, "");

                        initialize();
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
                google.maps.event.addDomListener(window, 'load', initialize);
            }
            //google.maps.event.addDomListener(window, 'load', initialize);

        </script>

    </fieldset>
    <fieldset>
        <legend>Job Description <span title="required">*</span></legend>
        <p>Give details about the position, such as responsibilities &amp; salary.</p>
        @if(isset($job->job_description))
        <textarea name="job_description">{{ e($job->job_description) or ''}}</textarea>
        @else
        <textarea name="job_description"></textarea>
        @endif
    </fieldset>
    <fieldset>
        <legend>Video Link</legend>
        <p>Copy the video link from the browser</p><p>
            @if(isset($job->job_video_link))
            <input type="text" name="job_video_link" class="text" value="{{$job->job_video_link or ''}}">
            @else
            <input type="text" name="job_video_link" class="text" value="{{$job->job_video_link or ''}}">
            @endif
        </p>
    </fieldset>
</form>
