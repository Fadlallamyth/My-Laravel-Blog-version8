/* new */

$(document).ready(function(){
    var $regexname=/(^([a-zA-z0-9]+)(\d+)?$)/u;
    $('#slug').on('keypress keydown keyup',function(){
             if (!$(this).val().match($regexname)) {
              // there is a mismatch, hence show the error message
                 $('.emsg').removeClass('hidden');
                 $('.emsg').show();
             }
           else{
                // else, do not display message
                $('.emsg').addClass('hidden');
               }
         });
});


$('#label_one').click(function(){
$('.label_one').css({"transition":"2s","display":"block"});
});

$('#label_two').click(function(){
    $('.label_two').fadeIn();
});

$('#label_three').click(function(){
    $('.label_three').fadeIn();
});

$('#label_four').click(function(){
    $('.label_four').fadeIn();
});

$('#label_five').click(function(){
    $('.label_five').fadeIn();
});

$('#website_info').click(function(){
    $('.website_info').show();
});

$('.cancelmenu').click(function(){
    $('.llhEMd').hide();
});





/* posts number */
$('#posts_quantity').click(function(){
    $('.posts_quantity').fadeIn();
});

/* posts number */
$('#most_views_span').click(function(){
    $('.most_views_div').fadeIn();
});



/*****************************************************************
*******************************************************************
*******************************************************************
*******************************************************************
*******************************************************************
*******************************************************************
*******************************************************************
*******************************************************************
*******************************************************************
*******************************************************************
*******************************************************************
*******************************************************************
*******************************************************************
*******************************************************************
*******************************************************************
*******************************************************************
*******************************************************************
*******************************************************************
*******************************************************************/


$(function () {
    $( "#numberBox" ).change(function() {
       var max = parseInt($(this).attr('max'));
       var min = parseInt($(this).attr('min'));
       if ($(this).val() > max)
       {
           $(this).val(max);
       }
       else if ($(this).val() < min)
       {
           $(this).val(min);
       }       
     }); 
 });


$(document).ready(function () {
    setTimeout(function () {
        $(".alert-success").fadeOut();
    }, 2000);
    /****** start configuration text editor WYSIWYG tinymce ************************* */
    tinymce.init({
        selector: "#textarea",
        height: "510px",
        plugins:
            " advlist image media autolink code codesample directionality table wordcount quickbars",
        images_upload_url:
            "{{route('admin.upload.image',['_token' => csrf_token() ])}}",
        file_picker_types: "file image media",
        image_caption: true,
        image_dimensions: true,
        directionality: "rtl",
        language: "ar",
        quickbars_selection_toolbar:
            "bold italic |h1 h2 h3 h4| formatselect | quicklink blockquote",
        entity_encoding: "raw",
        verify_html: false,
        object_resizing: "img",
        content_style:
            "body {font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif}",
    });
    /****** start configuration text editor WYSIWYG tinymce***************************** */

    /* on hover show user name */

    $(".useravatarimg").mouseenter(function () {
        $(".usernameabove").show();
    });
    $(".useravatarimg").mouseleave(function () {
        $(".usernameabove").hide();
    });

    /*************************
     ****************
     ********
     ****/
    /* show and hide user information div */
    var show_and_hide_user_info = true;
    $(".useravatarimg").on("click", function () {
        if (show_and_hide_user_info) {
            $(".userinformation").show();
            $(".usernameabove").hide();
            show_and_hide_user_info = false;
        } else {
            $(".userinformation").hide();
            show_and_hide_user_info = true;
        }
    });
    $(document).mouseup(function (e) {
        var container = $(".userinformation,.useravatarimg");
        if (show_and_hide_user_info == false) {
            if (
                !container.is(e.target) &&
                container.has(e.target).length === 0
            ) {
                $(".userinformation").hide();
                show_and_hide_user_info = true;
            }
        }
    });
    /* show and hide user information div */
    /****
     ********
     ****************
     *************************/

    /* open and close nav in big and small screen */
    var headernavbars = true;
    $(".bigscreen").on("click", function () {
        if (headernavbars) {
            $(".rightnav").css({ marginRight: "-330px", transition: "0.3s" });
            $(".maincontent").css({ marginRight: "0px", transition: "0.3s" });
            headernavbars = false;
        } else {
            $(".rightnav").css({ marginRight: "0", transition: "0.3s" });
            $(".maincontent").css({ marginRight: "300px", transition: "0.3s" });
            headernavbars = true;
        }
    });
    var smallscreen = true;
    $(".smallscreen").on("click", function () {
        if (smallscreen) {
            $(".rightnav").css({ marginRight: "0", transition: "0.3s" });
            smallscreen = false;
        } else {
            $(".rightnav").css({ marginRight: "-330px", transition: "0.3s" });
            smallscreen = true;
        }
    });


    window.onresize=()=>{el.style.display="none"}


    var resizeTimers;
    $(window).on("resize", function (e) {
        window.onresize=()=>{el.style.display="none"}
        clearTimeout(resizeTimers);
        resizeTimers = setTimeout(function () {
            if ($(window).width() > 800) {
                $(".rightnav").css({ marginRight: "0px", transition: "none" });
                $(".maincontent").css({
                    marginRight: "300px",
                    transition: "none",
                });
                $(".newadmincontrolarea").addClass('admincontrolarea').removeClass('newadmincontrolarea');
                $(".admincontrolarea").css({'display':'none'});
                $(".newadmincontrolarea").css({'display':'none'});
                smallscreen = true;
            } else {
                $(".rightnav").css({
                    marginRight: "-330px",
                    transition: "none",
                });
                $(".maincontent").css({
                    marginRight: "0px",
                    transition: "none",
                });
                $(".admincontrolarea").addClass('newadmincontrolarea').removeClass('admincontrolarea');
                $(".newadmincontrolarea").css({'display':'flex'});
                
                smallscreen = true;
            }
        }, 0);
    });
    /* open and close nav in big and small screen */

    var manageitems = true;
    $(".manageitems").on("click", function () {
        if (manageitems) {
            $(".checkboxandselected,.checkboxarea,.divforbtndelete").css({
                display: "flex",
            });
            $(".postsnumbers").css({ display: "none" });
            $(".manageitems").text("إلغاء");
            manageitems = false;
        } else {
            $(".checkboxandselected,.checkboxarea,.divforbtndelete").hide();
            $(".postsnumbers").css({ display: "block" });
            $(".manageitems").text("إدارة");
            manageitems = true;
        }
    });

    /* show and hide pubished and drafts DropDown Menu*/
    var postssdropdowpubanddraf = true;
    $(".postss").on("click", function () {
        if (postssdropdowpubanddraf) {
            $(".dropdowpubanddraf").css({ display: "flex" });
            postssdropdowpubanddraf = false;
        } else {
            $(".dropdowpubanddraf").hide();
            postssdropdowpubanddraf = true;
        }
    });

    $(document).mouseup(function (e) {
        if (postssdropdowpubanddraf == false) {
            var container = $(".dropdowpubanddraf");
            if (
                !container.is(e.target) &&
                container.has(e.target).length === 0
            ) {
                $(".dropdowpubanddraf").hide();
                postssdropdowpubanddraf = true;
            }
        }

        if (smallscreen == false) {
            var container = $(".rightnav,.smallscreen");
            if (
                !container.is(e.target) &&
                container.has(e.target).length === 0
            ) {
                $(".rightnav").css({
                    marginRight: "-330px",
                    transition: "0.3s",
                });
                smallscreen = true;
            }
        }
    });

    /* show and hide pubished and drafts DropDown Menu*/

    /* check to check all  */
    $(".tocheckall").click(function () {
        $(".willbecheck").prop("checked", $(this).prop("checked"));
    });

    /* إذا تم تحديد بوست واحد إذا قم بعمل تشك على الموجود بالأعلى */
    $(".willbecheck").click(function () {
        var isChecked = false;
        $(".willbecheck").each(function () {
            if ($(this).is(":checked")) {
                $(".tocheckall").prop("checked", $(this).prop("checked"));
                $("#deletespecifiec,#deletenultiplecats,#delete_multiple_pages").removeAttr(
                    "disabled"
                );
                isChecked = true;
            }
            if (!isChecked) {
                $(".tocheckall").prop("checked", false);
                $("#deletespecifiec,#deletenultiplecats,#delete_multiple_pages").prop(
                    "disabled",
                    true
                );
            }
        });
    });

    /* enabled button when select one post or more */
    $('[name="buttoncheckallname"]').change(function () {
        if ($(this).is(":checked") && $('[name="idp"]').is(":checked")) {
            $("#deletespecifiec,#deletenultiplecats,#delete_multiple_pages").removeAttr("disabled");
        } else {
            var VarisChecked = false;
            $('[name="idp"]').each(function () {
                if ($(this).is(":checked")) {
                    $("#deletespecifiec,#deletenultiplecats,#delete_multiple_pages").removeAttr(
                        "disabled"
                    );
                    VarisChecked = true;
                }
            });
            if (!VarisChecked) {
                $("#deletespecifiec,#deletenultiplecats,#delete_multiple_pages").attr(
                    "disabled",
                    "disabled"
                );
            }
        }
    });
    /* /enabled button when select one post or more */

    /* حساب المشاركات التي تم تحديدها */
    $(".tocheckall").click(function () {
        var checkboxes = $(
            '#devel-generate-content-form input[type="checkbox"]'
        ).filter(":checked").length;
        $("#count-checked-checkboxes").text(checkboxes);
    });
    /* حساب المشاركات التي تم تحديدها في حالة التحديد من الاسفل */
    var $checkboxes = $('#devel-generate-content-form input[type="checkbox"]');
    $checkboxes.change(function () {
        var countCheckedCheckboxes = $checkboxes.filter(":checked").length;
        $("#count-checked-checkboxes").text(countCheckedCheckboxes);
    });

    /*   on mouse over and on mouse leave hide and show user name */
    $(".userprofilearea").mouseenter(function () {
        $(this).find(".aduserearea").show();
    });
    $(".userprofilearea").mouseleave(function () {
        $(this).find(".aduserearea").hide();
    });
    $(".aduserearea").mouseenter(function () {
        $(this).hide();
    });
    $(".aduserearea").mouseleave(function () {
        $(this).show();
    });


    $(".tomakehoverspan").mouseenter(function () {
        $(this).find(".showpost").show();
    });
    $(".tomakehoverspan").mouseleave(function () {
        $(this).find(".showpost").hide();
    });
    

    if ($(window).width() > 800) {
    $(".one-container").mouseenter(function () {
        $(this).find(".admincontrolarea").css({'display':'flex'});
    });
    $(".one-container").mouseleave(function () {
        $(this).find(".admincontrolarea").hide();
    });
  }
    

    /* count the numbers of title and descriptipn********************************************* */
    $("[name='title'],[name='description'],[name='name'],[name='link']").keyup(
        function () {
            $(this).parent().find(".last_appended_counter").remove();
            $(this)
                .parent()
                .append(
                    '<div class="last_appended_counter" style="text-align:left">' +
                        $(this).val().length +
                        "</div>"
                );
        }
    );

    $("[name='title'],[name='description'],[name='name'],[name='link']").append(
        function () {
            $(this).parent().find(".last_appended_counter").remove();
            $(this)
                .parent()
                .append(
                    '<div class="last_appended_counter" style="text-align:left">' +
                        $(this).val().length +
                        "</div"
                );
        }
    );
});
