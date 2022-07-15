@extends('layouts.admin')
@section('title', 'Customer Detail')

@section('css')

@endsection

@section('content-header')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Customer Detail</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Customer Detail</a>
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
                    <h4 class="card-title">Customer Detail</h4>

                    <button type="button" class="btn btn-primary me-1 open-modal" data-heading="Add Contact Detail" data-target="table-body" data-update_url="{{ route('contact.ajax.list') }}" data-url="{{route('contact.ajax.addfrom')}}">Add Contact Detail</button>

                </div>
                <div class="card-datatable">
                    <table class="dt-row-grouping table table-responsive">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Name</th>
                                <th>Name-Company</th>
                                <th>Company Address</th>
                                <th>Contact email</th>
                                <th>Contact Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                            @include('ajax.contact.list')
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
    })
</script>

@endsection