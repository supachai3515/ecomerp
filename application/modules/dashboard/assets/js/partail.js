$(document).ready(function() {
    function popuRender(data, isShow) {
        $('#popupContainer').html("");
        $('#popupContainer').html(data);
        if (isShow) {
            $('#popupModal').modal('show');
        } else {
            $('#popupModal').modal('hide');
        }
    }
    $("#datatable_list").on("click",
        ".action_click",
        function() {
            try {
                var url = $(this).data("url");
                NProgress.start();
                $.ajax({
                    cache: false,
                    type: "GET",
                    url: url,
                    success: function(data) {
                        popuRender(data, true);
                        NProgress.done();
                    },
                    error: function(xhr, data, thrownError) {
                        console.log(xhr);
                        console.log(data);
                        if (xhr.status == 400) {
                            toastr.error(xhr.responseText, 'Error', {
                                closeButton: true,
                                timeOut: 0
                            });
                        } else {
                            toastr.error(thrownError, 'Error', { closeButton: true, timeOut: 0 });
                        }
                        NProgress.done();
                    }
                });
            } catch (error) {
                toastr.error(error);
                console.log(error);
                NProgress.done();
            }
        });

    $("#popupModal").on("submit",
        "#partial_form",
        function(e) {
            var el = $(this).find(':input[type=submit]');
            el.prop('disabled', true);
            setTimeout(function() {
                el.prop('disabled', false);
            }, 2000);

            var $form = $(this);
            var frmValues = $form.serialize();
            submitPopupModal($form, frmValues, e);
            e.preventDefault();
        });

    function submitPopupModal($form, frmValues, e) {
        NProgress.start();
        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: frmValues,
            async: true,
            processData: false,
            cache: false,
            success: function(data) {
                try {
                    JSON.parse(data);
                    var results = jQuery.parseJSON(data);
                    toastr.success(results.message, 'Sucess', { closeButton: true });
                    popuRender("", false);
                    $('#datatable_list').DataTable().ajax.reload(null, false);
                } catch (e) {
                    toastr.error(data, 'Error', { closeButton: true, timeOut: 0 });
                }
                NProgress.done();
            },
            error: function(xhr, data, thrownError) {
                if (xhr.status == 400) {
                    toastr.error(xhr.responseText, 'Error', { closeButton: true, timeOut: 0 });
                } else {
                    toastr.error(thrownError, 'Error', { closeButton: true, timeOut: 0 });
                }
                NProgress.done();
            }
        });
        e.preventDefault();
    }
});