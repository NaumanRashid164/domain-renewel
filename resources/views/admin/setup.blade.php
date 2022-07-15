@extends('layouts.admin')
@section('title', 'Setup')

@section('css')

@endsection

@section('content-header')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Setup</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Setup</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<!-- frequently asked questions tabs pills -->
<section id="faq-tabs">
    <!-- vertical tab pill -->
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="faq-navigation d-flex justify-content-between flex-column mb-2 mb-md-0">
                <!-- pill tabs navigation -->
                <ul class="nav nav-pills nav-left flex-column" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="pill" href="#module" aria-expanded="true" role="tab" data-update_url="{{ route('duration.index') }}" data-target="modules-list">
                            <img src="{{ asset('assets/app-assets/images/icons/brands/duration.png') }}" style="width: 23px !important;margin-right: 11px;" alt="icon">
                            <span class="fw-bold">Duration</span>
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="pill" href="#module" aria-expanded="true" role="tab" data-update_url="{{ route('duration.index','hosting') }}" data-target="modules-list">
                            <img src="{{ asset('assets/app-assets/images/icons/brands/duration.png') }}" style="width: 23px !important;margin-right: 11px;" alt="icon">
                            <span class="fw-bold">Hosting Duration</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="pill" href="#module" aria-expanded="false" role="tab" data-update_url="{{ route('duration.index','email') }}" data-target="modules-list">
                            <img src="{{ asset('assets/app-assets/images/icons/brands/duration.png') }}" style="width: 23px !important;margin-right: 11px;" alt="icon">
                            <span class="fw-bold">Email Duration</span>
                        </a>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="pill" href="#module" aria-expanded="false" role="tab" data-update_url="{{ route('name.index','registrant') }}" data-target="modules-list">
                            <img src="{{ asset('assets/app-assets/images/icons/brands/name.png') }}" style="width: 23px !important;margin-right: 11px;" alt="icon">
                            <span class="fw-bold">Registrant Name</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="pill" href="#module" aria-expanded="false" role="tab" data-update_url="{{ route('name.index','hosting') }}" data-target="modules-list">
                            <img src="{{ asset('assets/app-assets/images/icons/brands/name.png') }}" style="width: 23px !important;margin-right: 11px;" alt="icon">
                            <span class="fw-bold">Hosting Name</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="pill" href="#module" aria-expanded="false" role="tab" data-update_url="{{ route('name.index','email') }}" data-target="modules-list">
                            <img src="{{ asset('assets/app-assets/images/icons/brands/name.png') }}" style="width: 23px !important;margin-right: 11px;" alt="icon">
                            <span class="fw-bold">Email MX Host</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="pill" href="#module" aria-expanded="false" role="tab" data-update_url="{{ route('vat.index') }}" data-target="modules-list">
                            <img src="{{ asset('assets/app-assets/images/icons/brands/name.png') }}" style="width: 23px !important;margin-right: 11px;" alt="icon">
                            <span class="fw-bold">VAT Set up</span>
                        </a>
                    </li>

                </ul>

            </div>
        </div>

        <div class="col-lg-9 col-md-8 col-sm-12">
            <!-- pill tabs tab content -->
            <div class="tab-content">
                <!-- payment panel -->
                <div role="tabpanel" class="tab-pane active module_tab" id="module" aria-labelledby="module" aria-expanded="true">
                    <!-- icon and header -->
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-tag bg-primary me-1">
                            <img src="{{ asset('assets/app-assets/images/icons/brands/duration.png') }}" class="module_img" style="width: 23px !important" alt="icon">
                        </div>
                        <div>
                            <h4 class="mb-0 module_title">Duration</h4>
                        </div>
                    </div>


                    <div class="modules-list">
                        @include('admin.duration.list')

                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- / frequently asked questions tabs pills -->

@endsection

@section('js')
<script>
    
</script>

@endsection