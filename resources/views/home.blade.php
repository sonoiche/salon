@extends('layouts.app', ['page_title' => 'Dashboard', 'header' => ''])
@section('content')
<!-- Start:: row-1 -->
<div class="row">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="d-flex align-items-start gap-4 flex-wrap">
                    <div>
                        <span class="avatar avatar-lg bg-primary-transparent">
                            <i class="ri-shopping-bag-line fs-4"></i>
                        </span>
                    </div>
                    <div class="flex-fill d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <div class="mb-3">Total Sales</div>
                            <div class="text-muted mb-1 fs-12">
                                <span class="text-dark fs-20 lh-1 vertical-bottom">
                                    14,732
                                </span>
                            </div>
                            <span class="fs-12 mb-0"><i class="ti ti-arrow-narrow-up fs-16 align-middle text-success"></i><span class="badge bg-success-transparent text-success mx-1">+4.2%</span></span>
                        </div>
                        <div id="total-sales"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="d-flex align-items-start gap-4 flex-wrap">
                    <div>
                        <span class="avatar avatar-lg bg-info-transparent">
                            <i class="ri-bill-line fs-4"></i>
                        </span>
                    </div>
                    <div class="flex-fill d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <div class="mb-3">Total Expenses</div>
                            <div class="text-muted mb-1 fs-12">
                                <span class="text-dark fs-20 lh-1 vertical-bottom">
                                    $28,346.00
                                </span>
                            </div>
                            <div>
                                <span class="fs-12 mb-0"><i class="ti ti-arrow-narrow-up fs-16 align-middle text-success"></i><span class="badge bg-success-transparent text-success mx-1">+12.0%</span></span>
                            </div>
                        </div>
                        <div id="total-expenses"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="d-flex align-items-start gap-4 flex-wrap">
                    <div>
                        <span class="avatar avatar-lg bg-success-transparent">
                            <i class="ri-user-3-line fs-4"></i>
                        </span>
                    </div>
                    <div class="flex-fill d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <div class="mb-3">Total Visitors</div>
                            <div class="text-muted mb-1 fs-12">
                                <span class="text-dark fs-20 lh-1 vertical-bottom">
                                    1,29,368
                                </span>
                            </div>
                            <div>
                                <span class="fs-12 mb-0 text-danger"><i class="ti ti-arrow-narrow-down fs-16 align-middle"></i><span class="badge bg-danger-transparent mx-1">-7.6%</span></span>
                            </div>
                        </div>
                        <div id="total-visitors"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="d-flex align-items-start gap-4 flex-wrap">
                    <div>
                        <span class="avatar avatar-lg bg-warning-transparent">
                            <i class="ri-shopping-cart-2-line fs-4"></i>
                        </span>
                    </div>
                    <div class="flex-fill d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <div class="mb-3">Total Orders</div>
                            <div class="text-muted mb-1 fs-12">
                                <span class="text-dark fs-20 lh-1 vertical-bottom">
                                    35,367
                                </span>
                            </div>
                            <div>
                                <span class="fs-12 mb-0 text-success"><i class="ti ti-arrow-narrow-down fs-16 align-middle"></i><span class="badge bg-success-transparent mx-1">+2.5%</span></span>
                            </div>
                        </div>
                        <div id="total-orders"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End:: row-1 -->

<!-- Start:: row-3 -->
<div class="row">
    <div class="col-xl-6">
        <div class="card custom-card overflow-hidden">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Recent Orders
                </div>
                <a href="javascript:void(0);" class="link-primary fw-medium">View All Orders<i class="ri-arrow-right-s-line ms-1 align-middle"></i></a>
            </div>
            <div class="card-body px-0 pt-2 pb-0">
                <div class="table-responsive">
                    <table class="table text-nowrap table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Payment Mode</th>
                                <th scope="col">Status</th>
                                <th scope="col">Amount Paid</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="javascript:void(0);" class="text-primary text-decoration-underline">#ORD789ABC</a></td>
                                <td>
                                    <div>
                                        <span class="d-block mb-1">Rupay Card ****2783</span>
                                        <span class="d-block fs-12 text-muted fw-normal">Card Payment</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-success-transparent">Completed</span></td>
                                <td>
                                    <div>
                                        <span class="d-block mb-1">$1,234.78</span>
                                        <span class="d-block fs-12 text-muted fw-normal">Nov 22,2023</span>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-light btn-wave">
                                        <i class="fe fe-eye text-muted align-middle me-1"></i>
                                        View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="javascript:void(0);" class="text-primary text-decoration-underline">#ORD253SFW</a></td>
                                <td>
                                    <div>
                                        <span class="d-block mb-1 fw-normal">Digital Wallet</span>
                                        <span class="d-block fs-12 text-muted">Online Transaction</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-warning-transparent">Pending</span></td>
                                <td>
                                    <div>
                                        <span class="d-block mb-1">$623.99</span>
                                        <span class="d-block fs-12 text-muted fw-normal">Nov 22,2023</span>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-light btn-wave">
                                        <i class="fe fe-eye text-muted align-middle me-1"></i>
                                        View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="javascript:void(0);" class="text-primary text-decoration-underline">#ORD356SKF</a></td>
                                <td>
                                    <div>
                                        <span class="d-block mb-1 fw-normal">Mastro Card ****7893</span>
                                        <span class="d-block fs-12 text-muted">Card Payment</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-danger-transparent">Cancelled</span></td>
                                <td>
                                    <div>
                                        <span class="d-block mb-1">$1,324</span>
                                        <span class="d-block fs-12 text-muted fw-normal">Nov 21,2023</span>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-light btn-wave">
                                        <i class="fe fe-eye text-muted align-middle me-1"></i>
                                        View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="javascript:void(0);" class="text-primary text-decoration-underline">#ORD363ESD</a></td>
                                <td>
                                    <div>
                                        <span class="d-block mb-1 fw-normal">Cash On Delivery</span>
                                        <span class="d-block fs-12 text-muted">Pay On Delivery</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-success-transparent">Completed</span></td>
                                <td>
                                    <div>
                                        <span class="d-block mb-1">$1,123.49</span>
                                        <span class="d-block fs-12 text-muted fw-normal">Nov 20,2023</span>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-light btn-wave">
                                        <i class="fe fe-eye text-muted align-middle me-1"></i>
                                        View
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="border-bottom-0">
                                    <a href="javascript:void(0);" class="text-primary text-decoration-underline">#ORD253KSE</a>
                                </td>
                                <td class="border-bottom-0">
                                    <div>
                                        <span class="d-block mb-1 fw-normal">Visa Card ****2563</span>
                                        <span class="d-block fs-12 text-muted">Card Payment</span>
                                    </div>
                                </td>
                                <td class="border-bottom-0"><span class="badge bg-success-transparent">Completed</span></td>
                                <td class="border-bottom-0">
                                    <div>
                                        <span class="d-block mb-1">$1,289</span>
                                        <span class="d-block fs-12 text-muted fw-normal">Nov 18,2023</span>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <button class="btn btn-sm btn-outline-light btn-wave">
                                        <i class="fe fe-eye text-muted align-middle me-1"></i>
                                        View
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Top Customers
                </div>
                <div class="dropdown">
                    <a href="javascript:void(0);" class="p-2 fs-12 text-muted" data-bs-toggle="dropdown"> View All<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i> </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a class="dropdown-item" href="javascript:void(0);">Download</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);">Import</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);">Export</a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0 top-customers">
                    <li>
                        <a href="javascript:void(0);">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-top justify-content-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md avatar-rounded">
                                            <img src="{{ url('backend/images/faces/4.jpg') }}" alt="" />
                                        </span>
                                    </div>
                                    <div>
                                        <p class="mb-0 fs-14">Emma Wilson</p>
                                        <p class="mb-0 text-muted fs-12">15 Purchases<i class="bi bi-patch-check-fill fs-14 text-primary ms-2"></i></p>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <span class="text-muted d-block fs-12">Sale Value</span>
                                    <span class="fs-14">$1,835</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-top justify-content-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md avatar-rounded">
                                            <img src="{{ url('backend/images/faces/15.jpg') }}" alt="" />
                                        </span>
                                    </div>
                                    <div>
                                        <p class="mb-0 fs-14">Robert Lewis</p>
                                        <p class="mb-0 text-muted fs-12">18 Purchases<i class="bi bi-patch-check-fill fs-14 text-primary ms-2"></i></p>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <span class="text-muted d-block fs-12">Sale Value</span>
                                    <span class="fs-14">$2,415</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-top justify-content-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md avatar-rounded">
                                            <img src="{{ url('backend/images/faces/5.jpg') }}" alt="" />
                                        </span>
                                    </div>
                                    <div>
                                        <p class="mb-0 fs-14">Angelina Hose</p>
                                        <p class="mb-0 text-muted fs-12">21 Purchases<i class="bi bi-patch-check-fill fs-14 text-primary ms-2"></i></p>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <span class="text-muted d-block fs-12">Sale Value</span>
                                    <span class="fs-14">$2,341</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-top justify-content-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md avatar-rounded">
                                            <img src="{{ url('backend/images/faces/2.jpg') }}" alt="" />
                                        </span>
                                    </div>
                                    <div>
                                        <p class="mb-0 fs-14">Samantha Sam</p>
                                        <p class="mb-0 text-muted fs-12">24 Purchases<i class="bi bi-patch-check-fill fs-14 text-primary ms-2"></i></p>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <span class="text-muted d-block fs-12">Sale Value</span>
                                    <span class="fs-14">2,624</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-top justify-content-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md avatar-rounded">
                                            <img src="{{ url('backend/images/faces/14.jpg') }}" alt="" />
                                        </span>
                                    </div>
                                    <div>
                                        <p class="mb-0 fs-14">Dwayne Smith</p>
                                        <p class="mb-0 text-muted fs-12">32 Purchases<i class="bi bi-patch-check-fill fs-14 text-primary ms-2"></i></p>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <span class="text-muted d-block fs-12">Sale Value</span>
                                    <span class="fs-14">3,172</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Top Countries By Sales
                </div>
                <div class="dropdown">
                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-light" data-bs-toggle="dropdown">
                        <i class="fe fe-more-vertical"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <ul class="mb-0 list-unstyled top-countries">
                    <li>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center lh-1">
                                <span class="avatar avatar-xs me-2">
                                    <img src="{{ url('backend/images/flags/canada_flag.jpg') }}" alt="" />
                                </span>
                                <span class="top-country-name">Canada</span>
                            </div>
                            <div class="fs-14 lh-1">
                                <span class="text-success fs-12 fw-normal me-3"><i class="ti ti-arrow-narrow-up text-success ms-1"></i>0.78%</span>6,192
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center lh-1">
                                <span class="avatar avatar-xs me-2">
                                    <img src="{{ url('backend/images/flags/french_flag.jpg') }}" alt="" />
                                </span>
                                <span class="top-country-name">France</span>
                            </div>
                            <div class="fs-14 lh-1">
                                <span class="text-success fs-12 fw-normal me-3"><i class="ti ti-arrow-narrow-up text-success ms-1"></i>0.12%</span>5,932
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center lh-1">
                                <span class="avatar avatar-xs me-2">
                                    <img src="{{ url('backend/images/flags/spain_flag.jpg') }}" alt="" />
                                </span>
                                <span class="top-country-name">spain</span>
                            </div>
                            <div class="fs-14 lh-1">
                                <span class="text-danger fs-12 fw-normal me-3"><i class="ti ti-arrow-narrow-up text-danger ms-1"></i>0.54%</span>5,383
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center lh-1">
                                <span class="avatar avatar-xs me-2">
                                    <img src="{{ url('backend/images/flags/argentina_flag.jpg') }}" alt="" />
                                </span>
                                <span class="top-country-name">Argentina</span>
                            </div>
                            <div class="fs-14 lh-1">
                                <span class="text-success fs-12 fw-normal me-3"><i class="ti ti-arrow-narrow-up text-success ms-1"></i>0.25%</span>4,825
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center lh-1">
                                <span class="avatar avatar-xs me-2">
                                    <img src="{{ url('backend/images/flags/uae_flag.jpg') }}" alt="" />
                                </span>
                                <span class="top-country-name">Uae</span>
                            </div>
                            <div class="fs-14 lh-1">
                                <span class="text-success fs-12 fw-normal me-3"><i class="ti ti-arrow-narrow-up text-success ms-1"></i>0.56%</span>4,527
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center lh-1">
                                <span class="avatar avatar-xs me-2">
                                    <img src="{{ url('backend/images/flags/germany_flag.jpg') }}" alt="" />
                                </span>
                                <span class="top-country-name">Germany</span>
                            </div>
                            <div class="fs-14 lh-1">
                                <span class="text-danger fs-12 fw-normal me-3"><i class="ti ti-arrow-narrow-up text-danger ms-1"></i>0.04%</span>4,501
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center lh-1">
                                <span class="avatar avatar-xs me-2">
                                    <img src="{{ url('backend/images/flags/mexico_flag.jpg') }}" alt="" />
                                </span>
                                <span class="top-country-name">Mexico</span>
                            </div>
                            <div class="fs-14 lh-1">
                                <span class="text-danger fs-12 fw-normal me-3"><i class="ti ti-arrow-narrow-up text-danger ms-1"></i>0.47%</span>4,252
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End:: row-3 -->

<!-- Start:: row-4 -->
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Products Overview
                </div>
                <div class="d-sm-flex">
                    <div class="me-3 mb-3 mb-sm-0">
                        <input class="form-control form-control-sm" type="text" placeholder="Search" aria-label=".form-control-sm example" />
                    </div>
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                            Sort By<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="dropdown-item" href="javascript:void(0);">New</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Popular</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Relevant</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Product Id</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Sales</th>
                                <th scope="col">Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2 lh-1">
                                            <span class="avatar avatar-sm">
                                                <img src="{{ url('backend/images/ecommerce/png/17.png') }}" alt="" />
                                            </span>
                                        </div>
                                        <div class="fs-14">Niker College Bag</div>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-medium">#1734-9743</span>
                                </td>
                                <td>
                                    $199.99
                                </td>
                                <td>
                                    <span class="badge bg-success-transparent">Available</span>
                                </td>
                                <td>
                                    <span class="">3,903</span>
                                </td>
                                <td>
                                    <span class="">$67,899.24</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2 lh-1">
                                            <span class="avatar avatar-sm">
                                                <img src="{{ url('backend/images/ecommerce/png/14.png') }}" alt="" />
                                            </span>
                                        </div>
                                        <div class="fs-14">Dslr Camera (50mm f/1.9 HRM Lens)</div>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-medium">#1234-4567</span>
                                </td>
                                <td>
                                    $1,299.99
                                </td>
                                <td>
                                    <span class="badge bg-success-transparent">Available</span>
                                </td>
                                <td>
                                    <span class="">12,435</span>
                                </td>
                                <td>
                                    <span class="">$3,24,781.92</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2 lh-1">
                                            <span class="avatar avatar-sm">
                                                <img src="{{ url('backend/images/ecommerce/png/11.png') }}" alt="" />
                                            </span>
                                        </div>
                                        <div class="fs-14">Outdoor Bomber Jacket</div>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-medium">#1902-9883</span>
                                </td>
                                <td>
                                    $99.99
                                </td>
                                <td>
                                    <span class="badge bg-danger-transparent">Not Available</span>
                                </td>
                                <td>
                                    <span class="">5,143</span>
                                </td>
                                <td>
                                    <span class="">$76,102.76</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2 lh-1">
                                            <span class="avatar avatar-sm">
                                                <img src="{{ url('backend/images/ecommerce/png/5.png') }}" alt="" />
                                            </span>
                                        </div>
                                        <div class="fs-14">Light Blue Teddy</div>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-medium">#8745-1232</span>
                                </td>
                                <td>
                                    $79.00
                                </td>
                                <td>
                                    <span class="badge bg-warning-transparent">Limited Deal</span>
                                </td>
                                <td>
                                    <span class=""> 7,183</span>
                                </td>
                                <td>
                                    <span class="">$78,211.83</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2 lh-1">
                                            <span class="avatar avatar-sm">
                                                <img src="{{ url('backend/images/ecommerce/jpg/18.jpg') }}" alt="" />
                                            </span>
                                        </div>
                                        <div class="fs-14">Orange Smart Watch (24mm)</div>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-medium">#1962-9033</span>
                                </td>
                                <td>
                                    $199.99
                                </td>
                                <td>
                                    <span class="badge bg-primary-transparent">In Offer</span>
                                </td>
                                <td>
                                    <span class="">10,287</span>
                                </td>
                                <td>
                                    <span class="">$2,32,982.99</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer border-top-0">
                <div class="d-flex align-items-center">
                    <div>Showing 5 Entries <i class="bi bi-arrow-right ms-2 fw-medium"></i></div>
                    <div class="ms-auto">
                        <nav aria-label="Page navigation" class="pagination-style-4">
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="javascript:void(0);">
                                        Prev
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                <li class="page-item">
                                    <a class="page-link text-primary" href="javascript:void(0);">
                                        next
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End:: row-4 -->
@endsection
