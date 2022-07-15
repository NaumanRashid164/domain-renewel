@extends('layouts.admin')
@section('title', 'Customer Service')

@section('css')

@endsection

@section('content-header')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Customer Service</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Customer Service</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<section id="row-grouping-datatable" class="mt-2">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Customer Service</h4>
                    <div class="col-5 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary me-1 mail" data-update_url="{{ route('customer.ajax.list') }}" data-url="{{route('mail.index')}}">Send Mail</button>
                        <button type="button" class="btn btn-primary me-1 open-modal" data-heading="Add Services" data-target="table-body" data-update_url="{{ route('customer.ajax.list') }}" data-url="{{route('customer.ajax.addfrom')}}">Add Customer Service</button>
                    </div>
                </div>
                <div class="card-datatable">
                    <table class="dt-row-grouping table table-responsive">
                        <thead>
                            <tr>
                                <th>Domain Name</th>
                                <th>Client Name</th>
                                <th>Client Email</th>
                                <th>Registration date</th>
                                <th>Expiry date</th>
                                <th>Day to due</th>
                                <th>Days overdue</th>
                                <th>Detail</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">

                            @include('ajax.customer.list')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')
<script>
    $(document).on('keyup', '.common', function() {
        var name = $(".name").val();
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
        console.log(date);
        if (duration != "--select--" && start_date != "") {
            $(".expiry_date").val(date.addDays(duration * 1));
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
</script>

@endsection