/* 
 JobFit Custom Javascript Functions
 Author: Jexter Dean Buenaventura
 */
(function ($) {

//Plugin for Switching active tab content
    $.fn.toggleTabs = function () {

        this.click(function () {
            var tab_id = $(this).attr('href');
            $('.dashboard-tabs li a').addClass('inactive'); // gets all <a> in the tab container
            $(this).removeClass('inactive'); //sets inactive to current clicked tab
            $('.dashboard-tab-pane').removeClass('active'); //removes active from all dashboard tab panels

            $(this).addClass('active'); //Sets clicked tab to active
            $(tab_id).addClass('active'); //Sets dashboard tab panel associated with clicked tab to active
        });
        //Plugin for pop up windows
        $.fn.popUp = function () {



        }

//Plugin for emailing references
        $.fn.emailReference = function () {


        }



    }



}(jQuery));
//Initialize Toggling Tabs For tabbed content
$('.dashboard-tabs li a').toggleTabs();
//For Quiz
//$("#slickQuiz").slickQuiz({perQuestionResponseMessaging: false, preventUnanswered: true});
//$("#slickQuiz2").slickQuiz({json: quizJSON2});

//For Text Editor
//tinymce.init({selector: 'textarea'});

//For Create Test
$(".create-test").click(function () {

    var site_url = $(".site-url").val();
    var create_test_form = site_url + 'jobtc-dashboards/create-test-form.php';
    BootstrapDialog.show({
        title: 'Create Test',
        size: 'size-normal',
        message: function (dialog) {
            var $message = $('<div></div>');
            var pageToLoad = dialog.getData('pageToLoad');
            $message.load(pageToLoad);
            return $message;
        },
        buttons: [{
                label: 'Create',
                action: function (dialog) {
                    dialog.close();
                }
            }, {
                label: 'Close',
                action: function (dialog) {
                    dialog.close();
                }
            }],
        data: {
            'pageToLoad': create_test_form
        }
    });
});
//Add Question
$(".add-question").click(function () {

    var site_url = $(".site-url").val();
    var add_question_form = site_url + '/jobtc-dashboards/add-question-form.php';
    BootstrapDialog.show({
        title: 'Add Question',
        size: 'size-wide',
        message: function (dialog) {
            var $message = $('<div></div>');
            var pageToLoad = dialog.getData('pageToLoad');
            $message.load(pageToLoad);
            return $message;
        },
        buttons: [{
                label: 'Add',
                action: function (dialog) {
                    dialog.close();
                }
            }, {
                label: 'Close',
                action: function (dialog) {
                    dialog.close();
                }
            }],
        data: {
            'pageToLoad': add_question_form
        },
        onshown: function () {
            $.getScript('http://tinymce.cachefly.net/4.1/tinymce.min.js');
            tinymce.init({selector: 'textarea'});
            $('.add-question textarea').fadeToggle();
            //For Button Dropdowns
            $('.selectpicker').selectpicker();
        }
    });
});
//Edit Test

$(".edit-test").click(function () {

    var site_url = $(".site-url").val();
    var edit_test_form = site_url + 'jobtc-dashboards/edit-test-form.php';
    BootstrapDialog.show({
        title: 'Edit Test',
        size: 'size-default',
        message: function (dialog) {
            var $message = $('<div></div>');
            var pageToLoad = dialog.getData('pageToLoad');
            $message.load(pageToLoad);
            return $message;
        },
        buttons: [{
                label: 'Save',
                action: function (dialog) {
                    dialog.close();
                }
            }, {
                label: 'Close',
                action: function (dialog) {
                    dialog.close();
                }
            }],
        data: {
            'pageToLoad': edit_test_form
        }

    });
});
//Preview Test
$(".preview-test").click(function () {

    var site_url = $(".site-url").val();
    var preview_test_form = site_url + '/jobtc-dashboards/preview-test-form.php'

    BootstrapDialog.show({
        title: 'Preview Test',
        size: 'size-default',
        message: function (dialog) {
            var $message = $('<div></div>');
            var pageToLoad = dialog.getData('pageToLoad');
            $message.load(pageToLoad);
            return $message;
        },
        buttons: [{
                label: 'Close',
                action: function (dialog) {
                    dialog.close();
                }
            }],
        data: {
            'pageToLoad': preview_test_form
        }

    });
});
//Link Test to Job
$(".link-to-job").click(function () {

    var site_url = $(".site-url").val();
    var link_to_job_form = site_url + '/jobtc-dashboards/link-to-job-form.php';
    BootstrapDialog.show({
        title: 'Link Test to a Job',
        size: 'size-default',
        message: function (dialog) {
            var $message = $('<div></div>');
            var pageToLoad = dialog.getData('pageToLoad');
            $message.load(pageToLoad);
            return $message;
        },
        buttons: [{
                label: 'Close',
                action: function (dialog) {
                    dialog.close();
                }
            }],
        data: {
            'pageToLoad': link_to_job_form
        }

    });
});
//Send Test to Applicants
$(".send-to-applicants").click(function () {

    var site_url = $(".site-url").val();
    var send_to_applicants_form = site_url + '/jobtc-dashboards/send-to-applicants-form.php';
    BootstrapDialog.show({
        title: 'Send Test to Applicants',
        size: 'size-default',
        message: function (dialog) {
            var $message = $('<div></div>');
            var pageToLoad = dialog.getData('pageToLoad');
            $message.load(pageToLoad);
            return $message;
        },
        buttons: [{
                label: 'Close',
                action: function (dialog) {
                    dialog.close();
                }
            }],
        data: {
            'pageToLoad': send_to_applicants_form
        }

    });
});
//Delete Test
$(".delete-test").click(function () {

});
//Duplicate Test
$(".duplicate-test").click(function () {

});
/*
 * For Edit Job 
 **/
$(".job-edit-link").click(function () {

    var get_list_index = $(this).parent().parent().parent().index();
    var job_id = $('.job:eq(' + get_list_index + ') input[name=job_id]').val();
    var edit_job_form = '/edit-job-form/' + job_id;
    BootstrapDialog.show({
        title: 'Edit Job',
        size: 'size-wide',
        message: function (dialog) {
            var $message = $('<div></div>');
            var pageToLoad = dialog.getData('pageToLoad');
            $message.load(pageToLoad);
            return $message;
        },
        buttons: [{
                label: 'Save',
                action: function (dialog) {
                    var ajaxurl = '/edit-job';
                    var form = $(".edit-job-form")[0];
                    var formData = new FormData(form);
                    formData.append('action', 'edit-job');
                    formData.append('logo', $('input[name=logo]')[0].files[0]);
                    formData.append('job_id', $('.job:eq(' + get_list_index + ') input[name=job_id]').val());
                    formData.append('job_description', $('#job_description_ifr').contents().find('p').html());
                    $.ajax({
                        url: ajaxurl,
                        type: "POST",
                        data: formData,
                        // THIS MUST BE DONE FOR FILE UPLOADING
                        contentType: false,
                        processData: false,
                        beforeSend: function () {

                        },
                        success: function (data) {
                            /*BootstrapDialog.show({
                             message: 'Saved Job',
                             buttons: [{
                             label: 'Ok',
                             action: function () {
                             window.location.replace(getBaseURL());
                             }
                             }]
                             });*/
                            BootstrapDialog.alert(data);
                            dialog.close();
                        },
                        error: function (xhr, status, error) {
                            //alert(xhr.responseText);
                        }
                    }); //ajax
                }
            }, {
                label: 'Close',
                action: function (dialog) {
                    dialog.close();
                }
            }],
        data: {
            'pageToLoad': edit_job_form
        },
        onshown: function () {
            tinymce.remove();
            //$.getScript('http://tinymce.cachefly.net/4.1/tinymce.min.js');
            $.getScript('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize');
            tinymce.init({selector: 'textarea'});
        }
    });
});
/* 
 * Submit Job 
 **/
$(".submit-job").click(function () {

    var edit_job_form = '/submit-job-form';
    BootstrapDialog.show({
        title: 'Submit Job',
        size: 'size-wide',
        message: function (dialog) {
            var $message = $('<div></div>');
            var pageToLoad = dialog.getData('pageToLoad');
            $message.load(pageToLoad);
            return $message;
        },
        buttons: [{
                label: 'Submit',
                action: function (dialog) {
                    var ajaxurl = '/submit-job';
                    var form = $(".edit-job-form")[0];
                    var formData = new FormData(form);
                    formData.append('action', 'submit-job');
                    formData.append('logo', $('input[name=logo]')[0].files[0]);
                    formData.append('job_description', $('#job_description_ifr').contents().find('p').html());
                    $.ajax({
                        url: ajaxurl,
                        type: "POST",
                        data: formData,
                        // THIS MUST BE DONE FOR FILE UPLOADING
                        contentType: false,
                        processData: false,
                        beforeSend: function () {

                        },
                        success: function (data) {
                            /*BootstrapDialog.show({
                             message: 'Job Submitted',
                             buttons: [{
                             label: 'Ok',
                             action: function () {
                             window.location.replace(getBaseURL());
                             }
                             }]
                             });*/
                            BootstrapDialog.alert(data);
                            dialog.close();
                        },
                        error: function (xhr, status, error) {
                            //alert(xhr.responseText);
                        }
                    }); //ajax
                }
            }, {
                label: 'Close',
                action: function (dialog) {
                    dialog.close();
                }
            }],
        data: {
            'pageToLoad': edit_job_form
        },
        onshown: function () {
            tinymce.remove();
            //$.getScript('http://tinymce.cachefly.net/4.1/tinymce.min.js');
            $.getScript('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize');
            tinymce.init({selector: 'textarea'});
        }
    });
});
/*
 * For Edit Resume Pop Up
 **/
$(".edit-resume").click(function () {

    var edit_resume_form = '/edit-resume-form';
    BootstrapDialog.show({
        title: 'Edit Resume',
        size: 'size-wide',
        message: function (dialog) {
            var $message = $('<div></div>');
            var pageToLoad = dialog.getData('pageToLoad');
            $message.load(pageToLoad);
            return $message;
        },
        buttons: [{
                label: 'Save',
                action: function (dialog) {
                    var ajaxurl = '/edit-resume';
                    var form = $(".edit-resume-form")[0];
                    var formData = new FormData(form);
                    formData.append('action', 'edit-resume');
                    formData.append('resume_photo', $('input[name=resume_photo]')[0].files[0]);
                    formData.append('resume_doc', $('input[name=resume_doc]')[0].files[0]);
                    formData.append('additional_doc', $('input[name=additional_doc]')[0].files[0]);

                    $.ajax({
                        url: ajaxurl,
                        type: "POST",
                        data: formData,
                        // THIS MUST BE DONE FOR FILE UPLOADING
                        contentType: false,
                        processData: false,
                        beforeSend: function () {

                        },
                        success: function (data) {
                            /*BootstrapDialog.show({
                             message: 'Saved Resume',
                             buttons: [{
                             label: 'Ok',
                             action: function () {
                             window.location.replace(getBaseURL());
                             }
                             }]
                             });*/
                            BootstrapDialog.alert(data);
                            dialog.close();
                        },
                        error: function (xhr, status, error) {
                            //alert(xhr.responseText);
                        }
                    }); //ajax
                }
            }, {
                label: 'Close',
                action: function (dialog) {
                    dialog.close();
                }
            }],
        data: {
            'pageToLoad': edit_resume_form
        },
        onshown: function () {
            $.getScript('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize');
            //getYoutubePlayer();
        }
    });
});
/*
 * Unlink Job from a user 
 **/
$(".unlink-job-from-user").click(function () {


    var resume_id = $("input[name=resume_id]").val();
    var job_id = $("input[name=resume_job_id]").val();
    var token = $("input[name=_token]").val();
    var ajaxurl = '/unlink-from-job/' + resume_id + '/' + job_id;
    
    BootstrapDialog.confirm('Are you sure you want to unlink the applicant from the job?', function (result) {
        if (result) {

            $.ajax({
                url: ajaxurl,
                type: "GET",
                // THIS MUST BE DONE FOR FILE UPLOADING
                contentType: false,
                processData: false,
                beforeSend: function () {

                },
                success: function (data) {
                    BootstrapDialog.alert(data);
                    /*BootstrapDialog.show({
                     message: 'Unlink Successful',
                     buttons: [{
                     label: 'Ok',
                     action: function (data) {
                     //window.location.replace(getBaseURL());
                     BootstrapDialog.alert(data);
                     }
                     }]
                     });*/
                },
                error: function (xhr, status, error) {
                    //alert(xhr.responseText);
                }
            }); //ajax
            this.close();
        } else {
            this.close();
        }
    });
});
/*
 * For Unregistered Users Registering through a Job Listing 
 **/
$(".apply-for-job").click(function () {

    var site_url = $(".site-url").val();
    var resume_id = $("input[name=resume_id]").val();
    var apply_for_job_form = site_url + '/jobtc-jobs/apply-for-job-form.php';
    BootstrapDialog.show({
        title: 'Apply for Job',
        size: 'size-default',
        message: function (dialog) {
            var $message = $('<div></div>');
            var pageToLoad = dialog.getData('pageToLoad');
            $message.load(pageToLoad);
            return $message;
        },
        buttons: [{
                label: 'Register',
                action: function (dialog) {
                    var ajaxurl = $(".ajax-url").val();
                    //var form = $(".apply-for-job-form")[0];
                    //var formData = new FormData(form);

                    //formData.append('action', 'apply_for_job');
                    //formData.append('job_id', job_id);
                    var formData = $(".apply-for-job-form").serialize();
                    var job_id = $(".apply_job_id").val();
                    $.ajax({
                        url: ajaxurl,
                        type: "POST",
                        data: formData + '&job_id=' + job_id + '&action=apply_for_job',
                        beforeSend: function () {

                        },
                        success: function (data) {
                            BootstrapDialog.show({
                                message: 'Registration Successful',
                                buttons: [{
                                        label: 'Ok',
                                        action: function () {
                                            window.location.replace(getBaseURL());
                                        }
                                    }]
                            });
                        },
                        error: function (xhr, status, error) {
                            //alert(xhr.responseText);
                        }
                    }); //ajax
                }
            }, {
                label: 'Close',
                action: function (dialog) {
                    dialog.close();
                }
            }],
        data: {
            'pageToLoad': apply_for_job_form
        }
    });
});
/*
 * View Resume 
 **/
$(".resume-view-link").click(function () {

    var get_list_index = $(this).parent().parent().parent().parent().index();
    var resume_id = $('ol.resumes li.resume:eq(' + get_list_index + ') input[name=resume_id]').val();
    var view_resume_form = "/view-resume/" + resume_id;
    
    BootstrapDialog.show({
        title: 'View Resume',
        size: 'size-wide',
        message: function (dialog) {
            var $message = $('<div></div>');
            var pageToLoad = dialog.getData('pageToLoad');
            $message.load(pageToLoad);
            return $message;
        },
        buttons: [{
                label: 'Close',
                action: function (dialog) {
                    dialog.close();
                }
            }],
        data: {
            'pageToLoad': view_resume_form
        }
    });
});
/*
 * View Job 
 **/
$(".job-view-link").click(function () {


    var get_list_index = $(this).parent().parent().parent().index() - 1;
    var job_id = $('.job:eq(' + get_list_index + ') input[name=job_id]').val();
    var view_job_form = '/view-job/' + job_id;
    BootstrapDialog.show({
        title: 'View Job',
        size: 'size-wide',
        message: function (dialog) {
            var $message = $('<div></div>');
            var pageToLoad = dialog.getData('pageToLoad');
            $message.load(pageToLoad);
            return $message;
        },
        buttons: [{
                label: 'Close',
                action: function (dialog) {
                    dialog.close();
                }
            }],
        data: {
            'pageToLoad': view_job_form
        }
    });
});
/*
 * Link Job to a user  
 **/
$(".invite-to-job").click(function () {

    var resume_id = $("input[name=resume_id]").val();
    var job_map_form = '/invite-to-job-form/' + resume_id;
    BootstrapDialog.show({
        title: 'Invite to Job',
        size: 'size-default',
        message: function (dialog) {
            var $message = $('<div></div>');
            var pageToLoad = dialog.getData('pageToLoad');
            $message.load(pageToLoad);
            return $message;
        },
        buttons: [{
                label: 'Send',
                action: function (dialog) {
                    var ajaxurl = '/invite-to-job';
                    var form = $(".job-map-form")[0];
                    var formData = new FormData(form);
                    var job_id = $(".job option:selected").val();
                    formData.append('action', 'invite-to-job');
                    formData.append('job_id', job_id);
                    $.ajax({
                        url: ajaxurl,
                        type: "POST",
                        data: formData,
                        // THIS MUST BE DONE FOR FILE UPLOADING
                        contentType: false,
                        processData: false,
                        beforeSend: function () {

                        },
                        success: function (data) {
                            /*BootstrapDialog.show({
                             message: 'Invite Sent',
                             buttons: [{
                             label: 'Ok',
                             action: function () {
                             window.location.replace(getBaseURL());
                             }
                             }]
                             });*/
                            BootstrapDialog.alert(data);
                            dialog.close();
                        },
                        error: function (xhr, status, error) {
                            //alert(xhr.responseText);
                        }
                    }); //ajax
                }
            }, {
                label: 'Close',
                action: function (dialog) {
                    dialog.close();
                }
            }],
        data: {
            'pageToLoad': job_map_form
        }
    });
});
$(".email-reference").on("click", function () {

    var site_url = $(".site-url").val();
    var email_reference = site_url + '/jobtc-resume/email-reference.php';
    BootstrapDialog.show({
        title: 'Request Reference',
        size: 'size-wide',
        message: function (dialog) {
            var $message = $('<div></div>');
            var pageToLoad = dialog.getData('pageToLoad');
            $message.load(pageToLoad);
            return $message;
        },
        buttons: [{
                label: 'Send',
                action: function (dialog) {
                    dialog.close();
                }
            }, {
                label: 'Close',
                action: function (dialog) {
                    dialog.close();
                }
            }],
        data: {
            'pageToLoad': email_reference
        }
    });
});
// Prevent bootstrap dialog from blocking focusing
$(document).on('focusin', function (e) {
    if ($(e.target).closest(".mce-window").length) {
        e.stopImmediatePropagation();
    }
});
//Get Base Url
function getBaseURL() {
    var url = location.href; // entire url including querystring - also: window.location.href;
    var baseURL = url.substring(0, url.indexOf('/', 14));
    if (baseURL.indexOf('http://localhost') != -1) {
        // Base Url for localhost
        var url = location.href; // window.location.href;
        var pathname = location.pathname; // window.location.pathname;
        var index1 = url.indexOf(pathname);
        var index2 = url.indexOf("/", index1 + 1);
        var baseLocalUrl = url.substr(0, index2);
        return baseLocalUrl + "/";
    }
    else {
        // Root Url for domain name
        return baseURL + "/";
    }

}

function getYoutubePlayer() {

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
        text.value = "https://www.youtube.com/embed/" + event.data.videoId;
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

}


$('.collaps').bind('expand', function (evt) {
    evt.stopPropagation();
});
$('.collaps').bind('collapse', function (evt) {
    evt.stopPropagation();
});


