NProgress.start();
$(document).ready(function() {
    NProgress.done();
    var startDate = moment().startOf('years');
    var endDate = moment();
    $("#date_search").val(moment(startDate).format("DD/MM/YYYY") + ' - ' + moment(endDate).format("DD/MM/YYYY"));
    $(function() {
        $('input[name="date_search"]').daterangepicker({
                startDate: startDate,
                endDate: endDate,
                opens: 'right',
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'This month': [
                        moment().startOf('month'),
                        moment().endOf('month')
                    ],
                    'Last month': [
                        moment().subtract(1, 'month').startOf('month'),
                        moment().subtract(1, 'month').endOf('month')
                    ],
                    'This year': [
                        moment().startOf('years'),
                        moment().endOf('years')
                    ],
                    'Last year': [
                        moment().subtract(1, 'years').startOf('years'),
                        moment().subtract(1, 'years').endOf('years')
                    ]
                },
                locale: {
                    cancelLabel: 'Clear',
                    format: 'DD/MM/YYYY',
                    language: "th"
                },
            },
            function(start, end, label) {
                console.log("A new date selection was made: " +
                    start.format('YYYY-MM-DD') +
                    ' to ' +
                    end.format('YYYY-MM-DD'));
            });
    });


    var datatableVM;
    datatableVM = {
        dt: null,
        init: function() {
            dt = $('#datatable_list').DataTable({
                "columnDefs": [{
                        "className": "text-center",
                        "targets": [1, 5, 6]
                    },
                    {
                        "className": "text-right",
                        "targets": [4]
                    }, {
                        "className": "align-middle",
                        "targets": [0, 1, 2, 3, 4, 5, 6]
                    },
                ],
                order: [
                    [0, "desc"]
                ],
                "language": {
                    "processing": "<i class='fas fa-spinner fa-spin fa-3x fa-fw'></i>"
                },
                "searching": true,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": $('#datatable_list').data('url'),
                    "type": "POST",
                    "dataType": "JSON",
                    "data": function(data) {
                        data.date_search = $("#date_search").val();
                    }
                },
                "columns": [{
                        "data": 'created_date'
                    }, {
                        "data": 'type_name'
                    },
                    {
                        "data": 'name'
                    },
                    {
                        "data": 'phone'
                    },
                    {
                        "data": 'amount',
                        "render": function(data, type, row) {
                            try {
                                return $.number(Number(data), 2)
                            } catch (error) {
                                return '';
                            }
                        }
                    },
                    {
                        "data": 'active',
                        "render": function(data, type, row) {
                            var str = "";
                            if (data == false) {
                                str = str + '<span class= "text-danger"><i class="far fa-times-circle"></i></span><br>';

                            } else {
                                str = str + '<span class= "text-success"><i class="fas fa-check-circle"></i></span><br>';
                            }
                            return str
                        },
                    }, {
                        "data": col_action,
                        "sortable": false
                    }
                ]
            });

        },
        refresh: function() {
            dt.ajax.reload();
        }
    }

    function col_action(data) {
        var str = "";
        str = str + ' <button  type="button" data-url="/loan/view/?id=' + data.id + '&type=' + data.type + '"  class="btn btn-sm btn-outline-info action_click"><i class="fas fa-search"></i></button>';
        return str;
    }
    // initialize the datatables
    datatableVM.init();
    $('#date_search').on('apply.daterangepicker', function(ev, picker) {
        $('#datatable_list').DataTable().ajax.reload(null, false);
    });

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
});