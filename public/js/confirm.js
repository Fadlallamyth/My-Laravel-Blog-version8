$(document).ready(function () {
    /* do_you_want_publish */
    /* do_you_want_publish */
    /* do_you_want_publish */
    /* do_you_want_publish */
    /* do_you_want_publish */
    /* do_you_want_publish */
    /* do_you_want_publish */

    $(".do_you_want_publish").on("submit", function (e) {
        e.preventDefault();
        
        if($("#publishornot").val() == 1){
            Swal.fire({
                title: 'هل تريد نشر المشاركة؟',
                text: 'سيؤدي هذا الإجراء إلى نشر هذه المشاركة إلى مدونتك.',
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: 'تأكيد',
                backdrop: false,
                cancelButtonText: "إلغاء",
                showClass: {
                    popup: "animate__animated animate__zoomIn",
                },
                hideClass: {
                    popup: "animate__animated animate__zoomOut",
                }
            }).then((result) => {        
                if (result.isConfirmed) {
                    Swal.fire({
                        position: "bottom-start",
                        title: 'جار نشر المشاركة',
                        showClass: {
                            popup: "animate__animated animate__fadeInUp",
                        },
                        hideClass: {
                            popup: "animate__animated animate__fadeOutDown",
                        },
                        showConfirmButton: false,
                        backdrop: false,
                        timer: 22000,
                    });
                var form = this;
                form.submit();
                }
            });
        }else{
            var form = this;
            form.submit();
        }
       
        
    });

    /* do_you_want_publish */
    /* do_you_want_publish */
    /* do_you_want_publish */
    /* do_you_want_publish */
    /* do_you_want_publish */
    /* do_you_want_publish */
    /* do_you_want_publish */

    /* delete one post */
    $(".submitdeletform,.submitdeleteconecat,.one_page_delete").on(
        "submit",
        function (e) {
            e.preventDefault();

            if ($(this).hasClass("submitdeletform")) {
                var title = "هل تريد حذف المشاركة؟";
                var content =
                    "سيؤدي ذلك إلى حذف المشاركة. لن يكون بإمكانك عرضها أو تعديلها بمجرد حذفها.";
                var deleteconfirm = "حذف المشاركة";
                var postmsg = "تم حذف المشاركة بنجاح";
                var onepostprogressdeleting = "يجري حذف المشاركة";
            } else if ($(this).hasClass("ignorepost")) {
                var title = "هل تريد تجاهل المشاركة؟";
                var content =
                    "سيؤدي ذلك إلى تجاهل المشاركة. لن يكون بإمكانك عرضها أو تعديلها بمجرد تجاهلها.";
                var deleteconfirm = "تجاهل المشاركة";
                var postmsg = "تم تجاهل المشاركة بنجاح";
                var onepostprogressdeleting = "يجري تجاهل المشاركة";
            } else if ($(this).hasClass("confirmdeletingpage")) {
                var title = "هل تريد حذف الصفحة؟";
                var content =
                    "سيؤدي ذلك إلى حذف الصفحة. لن يكون بإمكانك عرضها أو تعديلها بمجرد تجاهلها.";
                var deleteconfirm = "حذف الصفحة";
                var postmsg = "تم حذف الصفحة بنجاح";
                var onepostprogressdeleting = "يجري حذف الصفحة";
            } else if ($(this).hasClass("ignorepage")) {
                var title = "هل تريد تجاهل الصفحة؟";
                var content =
                    "سيؤدي ذلك إلى تجاهل الصفحة. لن يكون بإمكانك عرضها أو تعديلها بمجرد تجاهلها.";
                var deleteconfirm = "تجاهل الصفحة";
                var postmsg = "تم تجاهل الصفحة بنجاح";
            } else if ($(this).hasClass("submitdeleteconecat")) {
                var title = "هل تريد حذف التصنيف؟";
                var content =
                    "سيؤدي ذلك إلى حذف التصنيف. بما في ذلك المشاركات التي فيه.";
                var deleteconfirm = "حذف التصنيف";
                var postmsg = "تم حذف التصنيف بنجاح";
                var onepostprogressdeleting = "يجري حذف التصنيف";
            } else if ($(this).hasClass("one_page_delete")) {
                var title = "هل تريد حذف الصفحة؟";
                var content =
                    "سيؤدي ذلك إلى حذف الصفحة. لن يكون بإمكانك عرضها أو تعديلها بمجرد حذفها.";
                var deleteconfirm = "حذف الصفحة";
                var postmsg = "تم حذف الصفحة بنجاح";
                var onepostprogressdeleting = "يجري حذف الصفحة";
            }

            Swal.fire({
                title: title,
                text: content,
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: deleteconfirm,
                backdrop: false,
                cancelButtonText: "إلغاء",
                showClass: {
                    popup: "animate__animated animate__zoomIn",
                },
                hideClass: {
                    popup: "animate__animated animate__zoomOut",
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        url: $(this).data("route"),
                        data: {
                            _method: "delete",
                        },

                        beforeSend: function () {
                            Swal.fire({
                                position: "bottom-start",
                                title: onepostprogressdeleting,
                                showClass: {
                                    popup: "animate__animated animate__fadeInUp",
                                },
                                hideClass: {
                                    popup: "animate__animated animate__fadeOutDown",
                                },
                                showConfirmButton: false,
                                timer: 22000,
                            });
                        },

                        success: function (response, textStatus, xhr) {
                            Swal.fire({
                                position: "bottom-start",
                                title: postmsg,
                                showClass: {
                                    popup: "animate__animated animate__fadeInUp",
                                },
                                hideClass: {
                                    popup: "animate__animated animate__fadeOutDown",
                                },
                                showConfirmButton: false,
                                backdrop: false,
                                timer: 2000,
                            }).then((result) => {
                                location.reload();
                            });
                        },
                    });
                }
            });
        }
    );
    /* / end delete one post */

    /*
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    */

    /* deleting multiple posts  */
    $("#deletespecifiec,#deletenultiplecats,#delete_multiple_pages").click(
        function (e) {
            e.preventDefault();
            var allids = [];
            $("input:checkbox[name=idp]:checked").each(function () {
                allids.push($(this).val());
            });

            if ($(this).is("#deletespecifiec")) {
                if (allids.length == "1") {
                    var title = "هل تريد حذف المشاركة؟";
                    var content =
                        "سيؤدي ذلك إلى إزالة هذه المشاركة من مدونتك. لن يكون بإمكانك عرضها أو تعديلها بمجرد حذفها.";
                    var confirmmessage = "حذف المشاركة";
                    var deleringisdone = "تم حذف المشاركة بنجاح";
                    var progressdeleting = "يجري حذف المشاركة";
                    var redirectedaction = "/deleteposts";
                } else if (allids.length == "2") {
                    var title = "هل تريد حذف المشاركتين؟";
                    var content =
                        "سيؤدي ذلك إلى إزالة هاتين المشاركتين من مدونتك. لن يكون بإمكانك عرضهما أو تعديلهما بمجرد حذفهما.";
                    var confirmmessage = "حذف المشاركتين";
                    var deleringisdone = "تم حذف المشاركتين بنجاح";
                    var progressdeleting = "يجري حذف المشاركتين";
                    var redirectedaction = "/deleteposts";
                } else if (allids.length == 0) {
                    var title = "لم تقم باختيار أي مشاركة";
                    var content =
                        "الرجاء قم باختيار واحدة على الأقل ما إذا كنت ترغب في حذفها.";
                    var confirmmessage = "ما من مشاركة لحذفها";
                    var redirectedaction = "/deleteposts";
                } else {
                    var title = "هل تريد حذف المشاركات؟";
                    var content =
                        "سيؤدي ذلك إلى إزالة هذه المشاركات من مدونتك. لن يكون بإمكانك عرضها أو تعديلها بمجرد حذفها.";
                    var confirmmessage = "حذف المشاركات";
                    var deleringisdone = "تم حذف المشاركات بنجاح";
                    var progressdeleting = "يجري حذف المشاركات";
                    var redirectedaction = "/deleteposts";
                }
            } else if ($(this).is("#deletenultiplecats")) {
                if (allids.length == "1") {
                    var title = "هل تريد حذف التصنيف؟";
                    var content =
                        "سيؤدي ذلك إلى إزالة هذا التصنيف من مدونتك. بما في ذلك المشاركات التي فيه.";
                    var confirmmessage = "حذف التصنيف";
                    var progressdeleting = "يجري حذف التصنيف";
                    var deleringisdone = "تم حذف التصنيف بنجاح";
                    var redirectedaction = "/deletecategories";
                } else if (allids.length == "2") {
                    var title = "هل تريد حذف التصنيفين؟";
                    var content =
                        " سيؤدي ذلك إلى إزالة هاذين التصنيفين من مدونتك. بما في ذلك المشاركات التي فيهما.";
                    var confirmmessage = "حذف التصنيفين";
                    var progressdeleting = "يجري حذف التصنيفين";
                    var deleringisdone = "تم حذف التصنيفين بنجاح";
                    var redirectedaction = "/deletecategories";
                } else if (allids.length == 0) {
                    var title = "لم تقم باختيار أي تصنيف";
                    var content =
                        "الرجاء قم باختيار واحد على الأقل ما إذا كنت ترغب في حذفه.";
                    var confirmmessage = "ما من تصنيف لحذفه";
                    var redirectedaction = "/deletecategories";
                } else {
                    var title = "هل تريد حذف التصنيفات؟";
                    var content =
                        "سيؤدي ذلك إلى إزالة هذه التصنيفات من مدونتك. بما في ذلك المشاركات التي فيها.";
                    var confirmmessage = "حذف التصنيفات";
                    var progressdeleting = "يجري حذف التصنيفات";
                    var deleringisdone = "تم حذف التصنيفات بنجاح";
                    var redirectedaction = "/deletecategories";
                }
            } else if ($(this).is("#delete_multiple_pages")) {
                if (allids.length == "1") {
                    var title = "هل تريد حذف الصفحة؟";
                    var content =
                        "سيؤدي ذلك إلى حذف هذه الصفحة. لن يكون بإمكانك عرضها أو تعديلها بمجرد حذفها.";
                    var confirmmessage = "حذف الصفحة";
                    var progressdeleting = "يجري حذف الصفحة";
                    var deleringisdone = "تم حذف الصفحة بنجاح";
                    var redirectedaction = "/deletecategories";
                } else if (allids.length == "2") {
                    var title = "هل تريد حذف الصفحتين؟";
                    var content =
                        "سيؤدي ذلك إلى إزالة هاتين الصفحتين من مدونتك. لن يكون بإمكانك عرضهما أو تعديلهما بمجرد حذفهما.";
                    var confirmmessage = "حذف الصفحتين";
                    var progressdeleting = "يجري حذف الصفحتين";
                    var deleringisdone = "تم حذف الصفحتين بنجاح";
                    var redirectedaction = "/deletecategories";
                } else if (allids.length == 0) {
                    var title = "لم تقم باختيار أي تصنيف";
                    var content =
                        "الرجاء قم باختيار واحد على الأقل ما إذا كنت ترغب في حذفه.";
                    var confirmmessage = "ما من تصنيف لحذفه";
                    var redirectedaction = "/deletecategories";
                } else {
                    var title = "هل تريد حذف الصفحات؟";
                    var content =
                        "سيؤدي ذلك إلى حذف هذه الصفحات من مدونتك. لن يكون بإمكانك عرضها أو تعديلها بمجرد حذفها.";
                    var confirmmessage = "حذف الصفحات";
                    var progressdeleting = "يجري حذف الصفحات";
                    var deleringisdone = "تم حذف الصفحات بنجاح";
                    var redirectedaction = "/deletepages";
                }
            }

            Swal.fire({
                title: title,
                text: content,
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: confirmmessage,
                backdrop: false,
                cancelButtonText: "إلغاء",
                showClass: {
                    popup: "animate__animated animate__zoomIn",
                },
                hideClass: {
                    popup: "animate__animated animate__zoomOut",
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    e.preventDefault();
                    var allids = [];
                    $("input:checkbox[name=idp]:checked").each(function () {
                        allids.push($(this).val());
                    });
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                    });
                    $.ajax({
                        url: redirectedaction,
                        type: "post",
                        data: {
                            _token: $("input[name=_token]").val(),
                            idp: allids,
                        },
                        beforeSend: function () {
                            Swal.fire({
                                position: "bottom-start",
                                title: progressdeleting,
                                showClass: {
                                    popup: "animate__animated animate__fadeInUp",
                                },
                                hideClass: {
                                    popup: "animate__animated animate__fadeOutDown",
                                },
                                showConfirmButton: false,
                                backdrop: false,
                                timer: 22000,
                            });
                        },
                        success: function (response) {
                            $.each(allids, function (key, val) {
                                $(".tocheckall").prop("checked", false);
                                Swal.fire({
                                    position: "bottom-start",
                                    title: deleringisdone,
                                    showClass: {
                                        popup: "animate__animated animate__fadeInUp",
                                    },
                                    hideClass: {
                                        popup: "animate__animated animate__fadeOutDown",
                                    },
                                    showConfirmButton: false,
                                    backdrop: false,
                                    timer: 2000,
                                }).then((result) => {
                                    location.reload();
                                });
                            });
                        },
                    });
                }
            });
        }
    );
    /* end deleting multiple posts  */
});
