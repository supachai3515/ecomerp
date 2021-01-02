NProgress.start();
$(document).ready(function() {
    NProgress.done();
    var base_url = $("#base_url").val();
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
                    "className": "align-middle text-center",
                    "targets": [1, 6, 7, 8]
                }, {
                    "className": "align-middle text-right",
                    "targets": [5]
                }, {
                    "className": "align-middle",
                    "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8]
                }],
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
                        "data": 'date'
                    }, {
                        "data": col_img,
                        "sortable": false
                    }, {
                        "data": 'brand'
                    }, {
                        "data": 'model'
                    }, {
                        "data": 'name',
                    }, {
                        "data": 'price',
                        "render": function(data, type, row) {
                            try {
                                return $.number(Number(data), 2)
                            } catch (error) {
                                return '';
                            }
                        },
                    },
                    {
                        "data": 'feature',
                        "render": function(data, type, row) {
                            var str = "";
                            if (data == true) {

                                str = str + '<span class= "text-success"><i class="fas fa-check-circle"></i></span><br>';
                            }
                            return str
                        }
                    }, {
                        "data": 'popular',
                        "render": function(data, type, row) {
                            var str = "";
                            if (data == true) {
                                str = str + '<span class= "text-success"><i class="fas fa-check-circle"></i></span><br>';
                            }
                            return str
                        }
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

    function col_img(data) {
        var str = "";
        if (data.photo) {
            str = str + '<a href="' + data.photo + '" data-lightbox="' + data.id + '" data-title="' + data.name + '">';
            str = str + '<img src="' + data.photo + '" style="width:50px;" class="img-responsive img-thumbnail">';
            str = str + '</a>';
        }
        return str;
    }

    function col_action(data) {
        var str = "";
        str = str + ' <button  type="button" data-url="'+base_url+'moto_used/edit/?id=' + data.id + '"  class="btn btn-sm btn-outline-warning action_click"><i class="far fa-edit"></i></button>';
        str = str + ' <button  type="button" data-url="'+base_url+'moto_used/view/?id=' + data.id + '"  class="btn btn-sm btn-outline-info action_click"><i class="fas fa-search"></i></button>';
        return str;
    }
    // initialize the datatables
    datatableVM.init();
    $('#date_search').on('apply.daterangepicker', function(ev, picker) {
        $('#datatable_list').DataTable().ajax.reload(null, false);
    });
});