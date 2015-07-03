@foreach($resume as $resumes) 
<div class="row">
    <div class="edit-resume-container col-md-12">
        <div class="section">

            <div class="section_content">
                <!--h1>Edit Resume</h1-->
                <form method="post" enctype="multipart/form-data" id="submit_form" class="edit-resume-form submit_form main_form" novalidate="novalidate">

                    {!! csrf_field() !!}

                    <fieldset>
                        <p class="optional">
                            <label for="desired_salary">Hourly Rate or Yearly Salary</label> 
                            <input type="text" class="text" name="rate" id="desired_salary" placeholder="e.g. 10" value="{{ $resumes->rate }}">
                        </p>
                        <p class="optional">
                            <label for="currency">Currency</label>
                            <select class="currency" name="currency"> 
                                <option value="PHP">Philippines Peso(PHP)</option>
                                <option value="ALL">Albania Lek(ALL)</option>
                                <option value="AFN">Afghanistan Afghani(AFN)</option>
                                <option value="ARS">Argentina Peso(ARS)</option>
                                <option value="AWG">Aruba Guilder(AWG)</option>
                                <option value="AUD">Australia Dollar(AUD)</option>
                                <option value="AZN">Azerbaijan New Manat(AZN)</option>
                                <option value="BSD">Bahamas Dollar(BSD)</option>
                                <option value="BBD">Barbados Dollar(BBD)</option>
                                <option value="BDT">Bangladeshi taka(BDT)</option>
                                <option value="BYR">Belarus Ruble(BYR)</option>
                                <option value="BZD">Belize Dollar(BZD)</option>
                                <option value="BMD">Bermuda Dollar(BMD)</option>
                                <option value="BOB">Bolivia Boliviano(BOB)</option>
                                <option value="BAM">Bosnia and Herzegovina Convertible Marka(BAM)</option>
                                <option value="BWP">Botswana Pula(BWP)</option>
                                <option value="BGN">Bulgaria Lev(BGN)</option>
                                <option value="BRL">Brazil Real(BRL)</option>
                                <option value="BND">Brunei Darussalam Dollar(BND)</option>
                                <option value="KHR">Cambodia Riel(KHR)</option>
                                <option value="CAD" selected="selected">Canadian Dollar(CAD)</option>
                                <option value="KYD">Cayman Islands Dollar(KYD)</option>
                                <option value="CLP">Chile Peso(CLP)</option>
                                <option value="CNY">China Yuan Renminbi(CNY)</option>
                                <option value="COP">Colombia Peso(COP)</option>
                                <option value="CRC">Costa Rica Colon(CRC)</option>
                                <option value="HRK">Croatia Kuna(HRK)</option>
                                <option value="CUP">Cuba Peso(CUP)</option>
                                <option value="CZK">Czech Republic Koruna(CZK)</option>
                                <option value="DKK">Denmark Krone(DKK)</option>
                                <option value="DOP">Dominican Republic Peso(DOP)</option>
                                <option value="XCD">East Caribbean Dollar(XCD)</option>
                                <option value="EGP">Egypt Pound(EGP)</option>
                                <option value="SVC">El Salvador Colon(SVC)</option>
                                <option value="EEK">Estonia Kroon(EEK)</option>
                                <option value="EUR">Euro Member Countries(EUR)</option>
                                <option value="FKP">Falkland Islands (Malvinas) Pound(FKP)</option>
                                <option value="FJD">Fiji Dollar(FJD)</option>
                                <option value="GHC">Ghana Cedis(GHC)</option>
                                <option value="GIP">Gibraltar Pound(GIP)</option>
                                <option value="GTQ">Guatemala Quetzal(GTQ)</option>
                                <option value="GGP">Guernsey Pound(GGP)</option>
                                <option value="GYD">Guyana Dollar(GYD)</option>
                                <option value="HNL">Honduras Lempira(HNL)</option>
                                <option value="HKD">Hong Kong Dollar(HKD)</option>
                                <option value="HUF">Hungary Forint(HUF)</option>
                                <option value="ISK">Iceland Krona(ISK)</option>
                                <option value="INR">India Rupee(INR)</option>
                                <option value="IDR">Indonesia Rupiah(IDR)</option>
                                <option value="IRR">Iran Rial(IRR)</option>
                                <option value="IMP">Isle of Man Pound(IMP)</option>
                                <option value="ILS">Israel Shekel(ILS)</option>
                                <option value="JMD">Jamaica Dollar(JMD)</option>
                                <option value="JPY">Japan Yen(JPY)</option>
                                <option value="JEP">Jersey Pound(JEP)</option>
                                <option value="KZT">Kazakhstan Tenge(KZT)</option>
                                <option value="KPW">Korea (North) Won(KPW)</option>
                                <option value="KRW">Korea (South) Won(KRW)</option>
                                <option value="KGS">Kyrgyzstan Som(KGS)</option>
                                <option value="LAK">Laos Kip(LAK)</option>
                                <option value="LVL">Latvia Lat(LVL)</option>
                                <option value="LBP">Lebanon Pound(LBP)</option>
                                <option value="LRD">Liberia Dollar(LRD)</option>
                                <option value="LTL">Lithuania Litas(LTL)</option>
                                <option value="MKD">Macedonia Denar(MKD)</option>
                                <option value="MYR">Malaysia Ringgit(MYR)</option>
                                <option value="MUR">Mauritius Rupee(MUR)</option>
                                <option value="MXN">Mexico Peso(MXN)</option>
                                <option value="MNT">Mongolia Tughrik(MNT)</option>
                                <option value="MZN">Mozambique Metical(MZN)</option>
                                <option value="NAD">Namibia Dollar(NAD)</option>
                                <option value="NPR">Nepal Rupee(NPR)</option>
                                <option value="ANG">Netherlands Antilles Guilder(ANG)</option>
                                <option value="NZD">New Zealand Dollar(NZD)</option>
                                <option value="NIO">Nicaragua Cordoba(NIO)</option>
                                <option value="NGN">Nigeria Naira(NGN)</option>
                                <option value="NOK">Norway Krone(NOK)</option>
                                <option value="OMR">Oman Rial(OMR)</option>
                                <option value="PKR">Pakistan Rupee(PKR)</option>
                                <option value="PAB">Panama Balboa(PAB)</option>
                                <option value="PYG">Paraguay Guarani(PYG)</option>
                                <option value="PEN">Peru Nuevo Sol(PEN)</option>
                                <option value="PLN">Poland Zloty(PLN)</option>
                                <option value="QAR">Qatar Riyal(QAR)</option>
                                <option value="RON">Romania New Leu(RON)</option>
                                <option value="RUB">Russia Ruble(RUB)</option>
                                <option value="SHP">Saint Helena Pound(SHP)</option>
                                <option value="SAR">Saudi Arabia Riyal(SAR)</option>
                                <option value="RSD">Serbia Dinar(RSD)</option>
                                <option value="SCR">Seychelles Rupee(SCR)</option>
                                <option value="SGD">Singapore Dollar(SGD)</option>
                                <option value="SBD">Solomon Islands Dollar(SBD)</option>
                                <option value="SOS">Somalia Shilling(SOS)</option>
                                <option value="ZAR">South Africa Rand(ZAR)</option>
                                <option value="LKR">Sri Lanka Rupee(LKR)</option>
                                <option value="SEK">Sweden Krona(SEK)</option>
                                <option value="CHF">Switzerland Franc(CHF)</option>
                                <option value="SRD">Suriname Dollar(SRD)</option>
                                <option value="SYP">Syria Pound(SYP)</option>
                                <option value="TWD">Taiwan New Dollar(TWD)</option>
                                <option value="THB">Thailand Baht(THB)</option>
                                <option value="TTD">Trinidad and Tobago Dollar(TTD)</option>
                                <option value="TRY">Turkey Lira(TRY)</option>
                                <option value="TRL">Turkey Lira(TRL)</option>
                                <option value="TVD">Tuvalu Dollar(TVD)</option>
                                <option value="UAH">Ukraine Hryvna(UAH)</option>
                                <option value="GBP">United Kingdom Pound(GBP)</option>
                                <option value="USD">United States Dollar(USD)</option>
                                <option value="UYU">Uruguay Peso(UYU)</option>
                                <option value="UZS">Uzbekistan Som(UZS)</option>
                                <option value="VEF">Venezuela Bolivar(VEF)</option>
                                <option value="VND">Viet Nam Dong(VND)</option>
                                <option value="YER">Yemen Rial(YER)</option>
                                <option value="ZWD">Zimbabwe Dollar(ZWD)</option>
                            </select>
                        </p> 

                        <h2>Your Contact Details</h2>
                        <p class="optional">
                            <label for="email">Email Address</label> 
                            <input type="text" class="text" name="email" value="{{ $resumes->email }}" id="email_address" placeholder="you@yourdomain.com">
                        </p>
                        <p class="optional">
                            <label for="tel">Telephone</label> 
                            <input type="text" class="text" name="phone" value="{{$resumes->phone}}" id="tel" placeholder="Telephone including area code">
                        </p>
                        <p class="optional">
                            <label for="mobile">Mobile</label> 
                            <input type="text" class="text" name="mobile" value="{{$resumes->mobile}}" id="mobile" placeholder="Mobile number">
                        </p>
                        <p class="optional">
                            <label for="mobile">Skype</label> 
                            <input type="text" class="text" name="skype" value="{{$resumes->skype}}" id="skype" placeholder="Skype ID">
                        </p>
                        <br>
                        <br>
                        <h2>Resume Photo and Uploads</h2>
                        <p class="optional">
                            <label for="your-photo">Resume Photo</label> 
                            <input type="file" class="text" name="resume_photo" id="your-photo" value="{{$resumes->resume_photo}}"></p>
                        <p class="optional">
                            <label for="your-resume">Resume(.doc or .docx)</label> 
                            <input type="file" class="text" name="resume_doc" id="your-resume" value="{{$resumes->resume_doc}}">
                        </p>
                    </fieldset>
                    <br>
                    <br>
                    <h2>Applicant Location</h2>
                    <div id="geolocation_box">
                        <p>
                            <label>
                                <input id="geolocation-load" type="button" class="button geolocationadd submit" onclick="javascript:codeAddress();" value="Find Address/Location">
                            </label>
                            <input type="text" class="text" name="location" id="geolocation-address" value="{{ $resumes->location }}">
                            <input type="hidden" class="text" name="latlng" id="geolocation-latLng" value="{{ $resumes->latlng }}">
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




                    <h2>Skills and Education</h2>

                    <legend>Overall Average, Last Year of Studies</legend>

                    @if($resumes->overall_average == 'below 70%') 
                    <input checked="checked" type="radio" name="overall_average" value="below 70%">
                    @else
                    <input type="radio" name="overall_average" value="below 70%">
                    @endif
                    <label class="overall_average">Below 70%</label>

                    @if($resumes->overall_average == '70% - 80%')
                    <input checked="checked" type="radio" name="overall_average" value="70% - 80%">
                    @else
                    <input type="radio" name="overall_average" value="70% - 80%">
                    @endif
                    <label class="overall_average">70% - 80%</label>

                    @if($resumes->overall_average == '80% - 90%')
                    <input checked="checked" type="radio" name="overall_average" value="80% - 90%">
                    @else
                    <input type="radio" name="overall_average" value="80% - 90%">
                    @endif
                    <label class="overall_average">80% - 90%</label>

                    @if($resumes->overall_average == '90% - 95%')
                    <input checked="checked" type="radio" name="overall_average" value="90% - 95%">
                    @else
                    <input type="radio" name="overall_average" value="90% - 95%">
                    @endif
                    <label class="overall_average">90% - 95%</label>


                    @if($resumes->overall_average == '95% - 100%')
                    <input checked="checked" type="radio" name="overall_average" value="95% - 100%">
                    @else
                    <input type="radio" name="overall_average" value="95% - 100%">
                    @endif
                    <label class="overall_average">95% - 100%</label>

                    <br>

                    <label>&nbsp;&nbsp;I have transcripts</label>
                    @if($resumes->transcripts == 'Yes')
                    <input checked="checked" type="checkbox" name="transcripts" value="Yes">
                    @else
                    <input type="checkbox" name="transcripts" value="Yes">
                    @endif

                    <br>

                    <p class="optional">
                        <label for="degree">Degree</label> 
                        <input type="text" class="text" name="degree" id="degree" value="{{ $resumes->degree }}"></p>

                    <p class="optional">
                        <label for="institution">Institution</label> 
                        <input type="text" class="text" name="institution" id="institution" value="{{ $resumes->institution }}">
                    </p>

                    <p class="optional">
                        <label for="year_issued">Year Issued</label>
                        <input class="text" type="text" name="year_issued" value="{{ $resumes->year_issued }}" id="degree_date_issued" placeholder="Year Issued">
                    </p>

                    <p class="optional">
                        <label for="skills">Separated with a comma e.g. AutoCAD Advanced, Flash basics, Typing 80 WPM, Simply Accounting Advanced</label> 
                        <input type="text" class="text" data-separator="," name="skills" class="skills" placeholder="e.g. Public Speaking, Team Management" value="{{ $resumes->skills }}">
                    <p class="optional">
                        <label for="misc-documents">Document Uploads</label> 
                        <input type="file" class="text" name="additional_doc" id="misc-documents" value="{{$resumes->additional_doc}}">
                    </p>

                    <h2>Career Map</h2>

                    
                    <!--References-->   
                    
                    @foreach($career_map as $map)
                    <fieldset>
                        @if($count == 1)
                        <h3>Most Recent</h3>
                        <input type="hidden" name="career_map_employment_{{$count}}" value="Most Recent" />
                        @elseif($count == 2)
                        <h3>2nd Most Recent</h3>
                        <input type="hidden" name="career_map_employment_{{$count}}" value="2nd Most Recent" />
                        @elseif ($count == 3)
                        <h3>3rd Most Recent</h3>
                        <input type="hidden" name="career_map_employment_{{$count}}" value="3rd Most Recent" />
                        @endif

                        
                        <p class="optional">
                            <label for="career_map_position_{{$count}}">Position</label> 
                            <input type="text" class="text" name="career_map_position_{{$count}}" value="{{$map->position}}"  placeholder="Position">
                        </p>

                        <p class="optional">
                            <label for="career_map_start_date_{{$count}}">Start Date</label>
                            <input class="text" type="date" name="career_map_start_date_{{$count}}" value="{{$map->start_date}}" placeholder="Start Date">   
                        </p>

                        <p class="optional">
                            <label for="career_map_end_date_{{$count}}">End Date</label>
                            <input class="text" type="date" name="career_map_end_date_{{$count}}" value="{{$map->end_date}}" placeholder="End Date">   
                        </p>


                        <p class="optional">
                            <label for="career_map_job_type_{{$count}}">Job Type</label>
                            <select class="career_map_job_type_1" name="career_map_job_type_{{$count}}"> 
                                <option>Full-Time</option>
                                <option>Part-Time</option>
                            </select>
                        </p>

                        <p class="optional"><label for="career_map_company_{{$count}}">Company</label> 
                            <input type="text" class="text" name="career_map_company_{{$count}}" value="{{$map->company}}" placeholder="Company">
                        </p>

                        <p class="optional"><label for="career_map_city_{{$count}}">City</label> 
                            <input type="text" class="text" name="career_map_city_{{$count}}" value="{{$map->city}}" placeholder="City">
                        </p>

                        <p class="optional">
                            <label for="career_map_country_{{$count}}">Country</label> 
                            <input type="text" class="text" name="career_map_country_{{$count}}" value="{{$map->country}}" placeholder="Country">
                        </p>

                        <p class="optional">
                            <label for="career_map_reason_for_leaving_{{$count}}">Reason for Leaving</label>
                            <select class="career_map_reason_for_leaving_{{$count}}" name="career_map_reason_for_leaving_{{$count}}"> 
                                <option selected="selected">Career change</option>
                                <option>Career growth</option>
                                <option>Change in career path</option>
                                <option>Company cut backs</option>
                                <option>Company downsized</option>
                                <option>Company went out of business</option>
                                <option>Family circumstances</option>
                                <option>Family reasons</option>
                                <option>Flexible schedule</option>
                                <option>Getting married</option>
                                <option>Hours reduced</option>
                                <option>Job was outsourced</option>
                                <option>Good career opportunity</option>
                                <option>Good reputation and opportunity at the new company</option>
                                <option>Laid off</option>
                                <option>Landed a higher paying job</option>
                                <option>Limited growth at company</option>
                                <option>Long commute</option>
                                <option>Looking for a new challenge</option>
                                <option>Needed a full-time position</option>
                                <option>New challenge</option>
                                <option>Not compatible with company goals</option>
                                <option>Not enough hours</option>
                                <option>Not enough work or challenge</option>
                                <option>Offered a permanent position</option>
                                <option>Personal reasons</option>
                                <option>Position eliminated</option>
                                <option>Position ended</option>
                                <option>Relocating</option>
                                <option>Reorganization or merger</option>
                                <option>Retiring</option>
                                <option>Seasonal position</option>
                                <option>Seeking a challenge</option>
                                <option>Seeking more responsibility</option>
                                <option>Staying home to raise a family</option>
                                <option>Summer job</option>
                                <option>Temporary job</option>
                                <option>Travel</option>
                                <option>Went back to school</option>
                                <option>About to get fired</option>
                                <option>Arrested</option>
                                <option>Bad company to work for</option>
                                <option>Bored at work</option>
                                <option>Childcare issues</option>
                                <option>Didn't get along with co-workers</option>
                                <option>Didn't like the schedule</option>
                                <option>Didn't want to work as many hours</option>
                                <option>Didn't want to work evening or weekends</option>
                                <option>Hated my boss</option>
                                <option>Hated my job</option>
                                <option>Injured</option>
                                <option>Job was too difficult</option>
                                <option>Let go for harassment</option>
                                <option>Let go for tardiness</option>
                                <option>Manager was stupid</option>
                                <option>My boss was a jerk</option>
                                <option>My mom made me quit</option>
                                <option>No transportation</option>
                                <option>Overtime was required</option>
                                <option>Passed over for promotion</option>
                                <option>Rocky marriage</option>
                            </select>
                        </p>
                        <p class="optional">
                            <label for="career_map_salary_type_{{$count}}">Salary Type</label>
                            <select class="career_map_salary_type_{{$count}}" name="career_map_salary_type_{{$count}}"> 
                                <option>Per Hour</option>
                                <option>Per Month</option>
                            </select>
                        </p>

                        <p class="optional">
                            <label for="career_map_starting_salary_{{$count}}">Starting Salary</label> 
                            <input type="text" class="text" name="career_map_starting_salary_{{$count}}" value="{{$map->starting_salary}}" placeholder="Starting Salary">
                        </p>

                        <p class="optional">
                            <label for="career_map_final_salary_{{$count}}">Final Salary</label> 
                            <input type="text" class="text" name="career_map_final_salary_{{$count}}" value="{{$map->final_salary}}" placeholder="Final Salary">
                        </p>

                        <p class="optional">
                            <label for="career_map_reference_name_{{$count}}">Reference Name</label> 
                            <input type="text" class="text" name="career_map_reference_name_{{$count}}" value="{{$map->reference_name}}" placeholder="Reference Name">
                        </p>

                        <p class="optional">
                            <label for="career_map_reference_email_{{$count}}">Reference Email</label> 
                            <input type="text" class="text" name="career_map_reference_email_{{$count}}" value="{{$map->reference_email}}" placeholder="Reference Email">
                        </p>

                        <p class="optional">
                            <label for="career_map_reference_phone_number_{{$count}}">Reference Phone Number</label> 
                            <input type="text" class="text" name="career_map_reference_phone_number_{{$count}}" value="{{$map->reference_phone_number}}" placeholder="Reference Phone Number">
                        </p>

                        <p class="optional">
                            <label for="career_map_reference_position_{{$count}}">Reference Position</label> 
                            <input type="text" class="text" name="career_map_reference_position_{{$count}}" value="{{$map->reference_position}}" placeholder="Reference Position">
                        </p>

                        <p class="optional"> 
                            <textarea style="width: 320px;" class="career_map_reference_notes_{{$count}}" name="career_map_reference_notes_{{$count}}" placeholder="Reference Additional Info">{{ e($map->position) }}</textarea>
                        </p>
                        
                    </fieldset>
                    {{--*/ $count++ /*--}}
                    @endforeach
                    <br>
                    <br>
                    <fieldset>
                        <div class="embed-responsive embed-responsive-16by9">
                            <div id="widget" class="embed-responsive-item"></div>
                            <div id="player"></div>
                        </div>
                        <script type="text/javascript">
                            var tag = document.createElement('script');

                            tag.src = "https://www.youtube.com/iframe_api";
                            var firstScriptTag = document.getElementsByTagName('script')[0];
                            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                            var player1;

                            function onYouTubeIframeAPIReady() {

                                new YT.UploadWidget('widget', {
                                    width: 870,
                                    events: {
                                        onStateChange: onWidgetStateChange,
                                        onUploadSuccess: onUploadSuccess,
                                        onProcessingComplete: onProcessingComplete
                                    }

                                });
                            }

                            function onWidgetStateChange(event) {
                                if (event.data.state == YT.UploadWidgetState.RECORDING) {

                                }

                            }

                            function onUploadSuccess(event) {
                                var text = document.getElementById('interview_video');
                                text.value = "https://www.youtube.com/embed/" + event.data.videoId + "&origin=http://localhost:8000";
                            }

                            function onProcessingComplete(event) {
                                /*  
                                 new YT.Player('player', {
                                 height: 300,
                                 width: 450,
                                 videoId: event.data.videoId,
                                 });*/
                                /*var text = document.getElementById('interview_video');
                                 text.value = "https://www.youtube.com/embed/" + event.data.videoId;*/

                            }
                        </script>

                        <div id="video_link">
                            <label>Interview Video Link</label>
                            <input id="interview_video" style="width:100%;" name="interview_video_link" type="text" value="{{$resumes->interview_video_link}}">
                        </div>	


                        <div id="video-interview-questions">  
                            <label>Video Interview Instructions</label>

                            <ul>
                                <li>You cannot stop and start the video without losing your previous recording.</li>
                                <li>Once you click “allow” on the popup window the video will start.</li>
                                <li>Once you have finished, click “upload”.</li>
                                <li>It takes a few minutes to see the video due to processing.</li>
                                <li>If you are having issues, try another browser.</li>
                                <li>You can also record on your computer, upload to Youtube then paste the link above.</li>
                            </ul>
                            <label>Video Interview Questions</label>

                            <ol>
                                <li>Why did you choose this line of work?</li>
                                <li>What do you do in your spare time?</li>
                                <li>What are your greatest strengths?</li>
                                <li>What are you greatest weaknesses?</li>
                                <li>Do you have any health or personal issues that may affect job performance?</li>
                                <li>In your last job how many sick days did you take off?</li>
                                <li>Why should we hire you?</li>
                            </ol>
                        </div>
                    </fieldset>
                </form>
            </div><!-- end section_content -->
        </div>
    </div>
</div>
@endforeach