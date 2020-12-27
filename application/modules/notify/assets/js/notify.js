$(document).ready(function() {
    $('#purpose').on('change', function() {
        if (this.value == '0')
        //.....................^.......
        {
            $("#multi").show();
        } else {
            $("#multi").hide();
        }
    });
    $('#user_select').select2({
        minimumInputLength: 0,
        allowClear: true,
        width: '100%',
        placeholder: '--- Select ---',
        ajax: {
            type: "POST",
            url: '/notify/get_users_list',
            dataType: 'json',
            headers: {
                "Content-Type": "application/json"
            },
            async: false,
            processData: false,
            cache: false,
            timeout: 30000,
            delay: 250,
            data: function(params) {
                return JSON.stringify({
                    name: params.term,
                });
            },
            processResults: function(res) {
                return {
                    results: res.data
                };
            }
        }
    });
    $("#send_noti").on("submit", function(e) {
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
            NProgress.done();
            try {
                if (data.error === true) {
                    toastr.error(data.message, 'Error', { closeButton: true, timeOut: 0 });
                } else {
                    toastr.success(data.message, 'Sucess', { closeButton: true });
                }
            } catch (e) {
                toastr.error(data, 'Error', { closeButton: true, timeOut: 0 });
            }
        },
        error: function(xhr, data, thrownError) {
            NProgress.done();
            if (xhr.status == 400) {
                toastr.error(xhr.responseText, 'Error', { closeButton: true, timeOut: 0 });
            } else {
                toastr.error(thrownError, 'Error', { closeButton: true, timeOut: 0 });
            }
        }
    });
    e.preventDefault();
}