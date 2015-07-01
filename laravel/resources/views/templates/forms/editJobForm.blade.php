<form method="post" enctype="multipart/form-data" id="submit_form" class="submit_form main_form edit-job-form" novalidate="novalidate">  

    {!! csrf_field() !!}

    <input type="hidden" name="job_id" value="">
    <fieldset> 
        <p class="optional"><label for="company-logo">Logo (.jpg, .gif or .png)</label>
            <input type="file" class="text" name="logo" id="company-logo">
        </p>
        <p class="optional">
            <label for="your_name">Your Name/Company Name</label> 
            <input type="text" class="text" name="company" id="your_name" value="{{$job->company or ''}}">
        </p>
        <p class="optional">
            <label for="website">Website</label> 
            <input type="text" class="text" name="website" value="{{$job->website or ''}}" placeholder="http://" id="website">
        </p>
    </fieldset>
    <fieldset>
        <p>
            <label for="job_term_cat">Job Title<span title="required">*</span></label>
            <input type="text" name="job_title" id="job_term_cat" class="job_term_cat text valid" value="{{$job->job_title or ''}}"> 
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
            <input type="text" class="text" name="job_category" value="{{$job->job_category or ''}}" id=""></p>
    </fieldset>

    <fieldset>
        <legend>Job Location</legend>
        <p>Leave blank if the location of the applicant does not matter e.g. the job involves working from home.</p>
        <div id="geolocation_box">
            <p>
                <label>
                    <input id="geolocation-load" type="button" class="button geolocationadd submit" onclick="javascript:codeAddress();" value="Find Address/Location">
                </label>
                <input type="text" class="text" name="location" id="geolocation-address" value="{{$job->location or ''}}">
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
        <textarea name="job_description">
        {{$job->job_description or ''}}
        </textarea>
    </fieldset>
    <fieldset>
        <legend>Video Link</legend>
        <p>Copy the video link from the browser</p><p>
            <input type="text" name="job_video_link" class="text" value="{{$job->job_video_link or ''}}">
        </p>
    </fieldset>
</form>
