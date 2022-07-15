<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="author" content="">
    <title class="color-e70c95">Domains-renewal | @yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/forms/select/select2.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">


    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <!-- END: Custom CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        form .error:not(input) {
            color: #ea5455;
        }

        form input.error,
        form input.error:focus {
            border-color: #ea5455 !important;
        }

        a.active img {
            filter: invert(1);
        }

        .avatar-tag img {
            filter: invert(1);
        }
    </style>
    @yield('css')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->

    @include('componet.header')

    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->

    @include('componet.sidebar')

    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->

    <!-- BEGIN: Content-->
    <div class="app-content content" style="padding-top: 30px !important">
        <div class="content-overlay"></div>
        <div class="content-wrapper container-xxl p-0">

            @yield('content-header')

            <div class="content-body">

                @yield('content')

            </div>
        </div>
    </div>
    <!-- END: Content-->



    <!-- END: Content-->
    <!--  Modal -->
    <div class="modal fade" id="modal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="text-center mb-2">
                    <h1 class="mb-1" id="modal-heading"></h1>
                </div>
                <div class="modal-body modal-data pb-5 px-sm-5 pt-50">

                </div>
            </div>
        </div>
    </div>
    <!--/ Modal -->

    <!-- Delete modal start -->
    <div class="modal fade" id="del-confirm-ajax" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="text-center mb-2">
                    <h1 class="mb-1">Are you sure?</h1>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <p>Deleted data may not be recoverable, click "Continue" if you want to proceed.</p>
                    <strong>You can lost other data too which is linked to this one. !</strong><br>
                    <button type="button" class="btn btn-danger me-1" id="del-final-ajax">Continue</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                        Discard
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete modal end -->



    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->

    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <script src="{{ asset('assets/app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{ asset('assets/app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
    <script src="{{ asset('assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('assets/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{ asset('assets/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('assets/app-assets/js/core/app.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

    <script src="{{ asset('assets/app-assets/js/form-select2.js')}}"></script>
    <script>
        $(document).ready(function() {
            if (feather) {
                feather.replace();
            }
            tableInit();
        });

        @if(session('message'))
        toastr.success("{{ session('message') }}");
        @elseif(session('error'))
        toastr.error("{{ session('error') }}");
        @elseif(session('warning'))
        toastr.warning("{{ session('warning') }}");
        @endif
    </script>



    <script>
        function tableInit() {
            let dt_row_grouping_table = $('.dt-row-grouping');
            var groupColumn = 0;
            if (dt_row_grouping_table.length) {
                var groupingTable = dt_row_grouping_table.DataTable({

                    order: [],
                    dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    displayLength: 10,
                    lengthMenu: [10, 20, 30, 40, 50, 60],

                    language: {
                        paginate: {
                            // remove previous & next text from pagination
                            previous: '&nbsp;',
                            next: '&nbsp;'
                        }
                    }
                });

                // Order by the grouping
                $('.dt-row-grouping tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
                        groupingTable.order([groupColumn, 'desc']).draw();
                    } else {
                        groupingTable.order([groupColumn, 'asc']).draw();
                    }
                });
            }

        }

        function validate() {
            var valid = true;
            $(".alert-danger").remove();

            $(".required:visible").each(function() {
                if ($(this).val() == "" || $(this).val() === null || ($(this).attr('type') == "radio" && $('[name="' + $(this).attr('name') + '"]:checked').val() == undefined)) {
                    $(this)
                        .closest("div")
                        .append('<div class="alert-danger">This field is required</div>');

                    valid = false;
                }
            });
            if (!valid) {
                $("html, body").animate({
                        scrollTop: $(".alert-danger:first").offset().top - 80,
                    },
                    100
                );
            }
            return valid;
        }

        var update_url, target_table;

        function updatePage(url, target) {

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    $('.table').DataTable().destroy();
                    console.log(target)
                    $('.' + target).html(response);
                    tableInit();
                    feather.replace();
                }
            });
        }

        $(document).on('click', '.open-modal,.edit-btn,.del-btn', function() {
            update_url = $(this).data('update_url');
            target = $(this).data('target');
        });

        //on click add faq
        $(document).on('click', '.open-modal', function() {
            var url = $(this).attr("data-url");
            var heading = $(this).data('heading');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    $('.modal-data').html(response);
                    $('#modal-heading').text(heading);
                    var basicPickr = $('.flatpickr-basic');
                    var select2 = $(".select2");
                    select2.each(function() {
                        $(this).select2({
                            dropdownParent: $(this).parent()
                        });
                    });
                    if (basicPickr.length) {
                        basicPickr.flatpickr({
                            dateFormat: 'd/m/Y',
                        });
                    }
                    $('#modal').modal('show');
                }
            });
        });


        // Mail

        $(document).on("click", ".mail", function(e) {
            e.preventDefault();
            url = $(this).attr("data-url");
            $.ajax({
                type: 'GET',
                cache: !1,
                contentType: !1,
                processData: !1,
                url: url,
                success: function(response) {
                    toastr.success(response);
                },
                error: function() {
                    toastr.error('Unknown Error!');
                }

            })
        });


        // //on click save faq
        $(document).on('submit', '.modal form', function(e) {
            e.preventDefault();
            if (!validate())
                return false;
            var form = $(this);
            var data = new FormData(this);
            $(form).find('button[type="submit"]').prop('disabled', true);

            $.ajax({
                type: 'POST',
                data: data,
                cache: !1,
                contentType: !1,
                processData: !1,
                url: $(form).attr('action'),
                async: true,
                headers: {
                    "cache-control": "no-cache"
                },
                success: function(response) {
                    updatePage(update_url, target);
                    $(form).closest('#modal').modal('hide');
                    $(form).find('button[type="button"]').prop('disabled', true);
                    toastr.success(response.success);
                },
                error: function(xhr, status, error) {
                    if (xhr.status == 422) {
                        $(form).find('div.alert').remove();
                        var errorObj = xhr.responseJSON.errors;
                        $.map(errorObj, function(value, index) {
                            var appendIn = $(form).find('[name="' + index + '"]').closest('div');
                            if (!appendIn.length) {
                                toastr.error(value[0]);
                            } else {
                                $(appendIn).append('<div class="alert alert-danger" style="padding: 1px 5px;font-size: 12px"> ' + value[0] + '</div>')
                            }
                        });

                        $(form).find('button[type="submit"]').prop('disabled', false);

                    } else {
                        toastr.error('Unknown Error!');
                        $(form).find('button[type="submit"]').prop('disabled', false);
                    }

                }
            });
        });


        $(document).on('click', '.del-btn', function(e) {
            e.preventDefault();
            var btn = $(this);
            var url = $(btn).attr('data-href');
            console.log(url);
            $('#del-final-ajax').attr('data', url);
            $('#del-confirm-ajax').modal('show');
        });

        $(document).on('click', '#del-final-ajax', function(e) {
            e.preventDefault();
            var btn = $(this);

            $(btn).prop('disabled', true);
            url = $(this).attr('data');
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    toastr.success(response);
                    $('#del-confirm-ajax').modal('hide');
                    updatePage(update_url, target);
                    $(btn).prop('disabled', false);
                },
                error: function() {
                    toastr.error('Unknown error!');
                    $(btn).prop('disabled', false);
                }
            });
        });


        $('.nav-link').on('click', function() {
            var page_name = $(this).find('span').text();
            var src = $(this).find('img').attr('src');
            update_url = $(this).data('update_url');
            target = $(this).data('target');
            updatePage(update_url, target);
            $('.module_tab').removeClass('active');
            $('.module_title').text(page_name);
            $('.module_img').attr("src", src);
            $('.module_tab').addClass('active');
        });

        $(document).on('change', '.update-status', function() {
            var url = $(this).data('url');
            var status = $(this).val();
            var id = $(this).data('id');
            update_url = $(this).data('update_url');
            target = $(this).data('target');
            $.ajax({
                url: url,
                type: 'get',
                data: {
                    status: status,
                    id: id
                },
                success: function(response) {
                    toastr.success(response);
                    updatePage(update_url, target);
                },
                error: function() {

                }
            });
        })
    </script>
    <!-- Customer (email,hosting,registrant) modal -->
    <script>
        $(document).on('keyup', '.common', function() {
            var name = $(".name").val();
            console.log("keyup working");
            var Company_name = $(".company_name").val();
            $(".nameCompany").val(name + "-" + Company_name);
        });

        function addZero(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        Date.prototype.addDays = function(days) {
            var date = new Date(this.valueOf());
            date.setDate(date.getDate() + days);
            return addZero(date.getDate()) +
                "/" +
                addZero(date.getMonth() + 1) +
                "/" +
                date.getFullYear();
        }

        $(document).on('change', '.duration,.start_date', function() {
            var duration = $(".duration").find("option:selected").text();
            var start_date = $(".start_date").val();

            var dateParts = start_date.split("/");

            // month is 0-based, that's why we need dataParts[1] - 1
            var date = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]);

            if (duration != "--select--" && start_date != "") {
                $(".end_date").val(date.addDays(duration * 1));
            }
        });
        $(document).on("change", ".service_check :checkbox", function() {
            if ($(this).is(':checked')) {
                $(".service").removeClass("hidden");
                $(".service_checkbox").val(1);
            } else {
                $(".service").addClass("hidden");
                $(".service_checkbox").val(0);
                $(".service").find("input").val("");
            }
        });
        $(document).on('change', '.vat_rate', function() {
            var vat_rate = ($(this).find("option:selected").attr("data-rate") * 1);
            var cost = ($(".cost").val() * 1);
            $(".vat").val(vat_rate * cost);
            $(".cost_inc_vat").val(vat_rate + cost);
        });
        $(document).on('keyup', '.cost', function() {
            var vat_rate = ($(".vat_rate").find("option:selected").attr("data-rate") * 1);
            var cost = ($(this).val() * 1);
            if (vat_rate) {
                $(".vat").val(vat_rate * cost);
                $(".cost_inc_vat").val(vat_rate + cost);
            }
        });
        $(document).on('change', '.hosted', function() {
            var radio = $(this).val();
            if (radio == "external") {
                $(".hosting_with").removeClass("hidden");
            } else {
                $(".hosting").val("");
                $(".hosting_with").addClass("hidden");
                console.log($(".hosting").val());
            }

        });
    </script>
    <!-- Customer (email,hosting,registrant) modal -->






    @yield('js')

</body>
<!-- END: Body-->

</html>