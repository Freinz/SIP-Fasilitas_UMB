@extends('layouts.main')

@section('title', 'Chart Widget')
@section('breadcrumb-item', 'Widget')

@section('breadcrumb-item-active', 'Chart')

@section('css')

<link rel="stylesheet" href="{{ URL::asset('build/css/plugins/jsvectormap.min.css') }}">


@endsection

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Earnings</h5>
                    <input type="date" class="form-control form-control-sm w-auto border-0 shadow-none2">
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-1">
                    <h3 class="mb-0">$894.39 <small class="text-muted">/+$200.10</small></h3>
                    <span class="badge bg-light-success ms-2">36%</span>
                </div>
                <p>Delivery Orders</p>
                <div id="customer-rate-graph"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">User Activities</h5>
                    <select class="form-select form-select-sm w-auto border-0 shadow-none">
                        <option>Today</option>
                        <option selected="">This week</option>
                        <option>Monthly</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <p class="mb-0">Sales</p>
                <h4>$2356.4</h4>
                <div id="monthly-report-graph"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5>Yearly Summary</h5>
                <div class="dropdown">
                    <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                            class="material-icons-two-tone f-18">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">View</a>
                        <a class="dropdown-item" href="#">Edit</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-center g-3 text-center mb-3">
                    <div class="col-6 col-md-4">
                        <div class="overview-product-legends">
                            <p class="text-muted mb-1"><span>Invoiced</span></p>
                            <h4 class="mb-0">$2356.4</h4>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="overview-product-legends">
                            <p class="text-muted mb-1"><span>Profit</span></p>
                            <h4 class="mb-0">$1935.6</h4>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="overview-product-legends">
                            <p class="text-muted mb-1"><span>Expenses</span></p>
                            <h4 class="mb-0">$468.9</h4>
                        </div>
                    </div>
                </div>
                <div id="yearly-summary-chart"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5>Overview</h5>
                <div class="dropdown">
                    <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                            class="material-icons-two-tone f-18">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">View</a>
                        <a class="dropdown-item" href="#">Edit</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-sm-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div class="d-flex align-items-center mb-2 mb-sm-0">
                        <h3 class="mb-0 me-1">$ 82.99</h3>
                        <span class="badge bg-success"><i class="ti ti-arrow-narrow-up"></i> 2.6%</span>
                    </div>
                    <ul class="nav nav-pills analytics-tab" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="analytics-tab-1" data-bs-toggle="tab"
                                data-bs-target="#analytics-tab-1-pane" type="button" role="tab"
                                aria-controls="analytics-tab-1-pane" aria-selected="true">Daily</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="analytics-tab-2" data-bs-toggle="tab"
                                data-bs-target="#analytics-tab-2-pane" type="button" role="tab"
                                aria-controls="analytics-tab-2-pane" aria-selected="false">Monthly</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane show active" id="analytics-tab-1-pane" role="tabpanel"
                        aria-labelledby="analytics-tab-1" tabindex="0">
                        <div id="overview-chart-1"></div>
                    </div>
                    <div class="tab-pane" id="analytics-tab-2-pane" role="tabpanel"
                        aria-labelledby="analytics-tab-2" tabindex="0">
                        <div id="overview-chart-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

@section('scripts')
<!-- [Page Specific JS] start -->
<script src="{{ URL::asset('build/js/plugins/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins/jsvectormap.min.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins/world.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins/world-merc.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/dashboard-default.js') }}"></script>
<!-- Apex Chart -->
<script src="{{ URL::asset('build/js/plugins/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/w-chart.js') }}"></script>
<!-- [Page Specific JS] end -->
@endsection