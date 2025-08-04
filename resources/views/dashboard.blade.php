@extends('layouts.main')

@section('title', 'SIP Fasilitas UM Banjarmasin')
@section('breadcrumb-item', 'Dashboard')

@section('breadcrumb-item-active', 'Home')

@section('css')
    <!-- map-vector css -->
    <link rel="stylesheet" href="{{ URL::asset('build/css/plugins/jsvectormap.min.css') }}">
@endsection

@section('content')

    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- System Overview Cards -->
        <div class="col-md-2 col-sm-6">
            <div class="card statistics-card-1 overflow-hidden">
                <div class="card-body text-center">
                    <i class="ph-duotone ph-users f-32 mb-2"></i>
                    <h6>Total Users</h6>
                    <h3 class="f-w-300">{{ $totalUsers ?? '0' }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="card statistics-card-1 overflow-hidden">
                <div class="card-body text-center">
                    <i class="ph-duotone ph-buildings f-32 mb-2"></i>
                    <h6>Total Rooms</h6>
                    <h3 class="f-w-300">{{ $totalRooms ?? '0' }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="card statistics-card-1 overflow-hidden">
                <div class="card-body text-center">
                    <i class="ph-duotone ph-toolbox f-32 mb-2"></i>
                    <h6>Total Equipment</h6>
                    <h3 class="f-w-300">{{ $totalEquipment ?? '0' }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="card statistics-card-1 overflow-hidden">
                <div class="card-body text-center">
                    <i class="ph-duotone ph-list-checks f-32 mb-2"></i>
                    <h6>Total Loans</h6>
                    <h3 class="f-w-300">{{ $totalLoans ?? '0' }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="card statistics-card-1 overflow-hidden">
                <div class="card-body text-center">
                    <i class="ph-duotone ph-arrow-counter-clockwise f-32 mb-2"></i>
                    <h6>Total Returns</h6>
                    <h3 class="f-w-300">{{ $totalReturns ?? '0' }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="card statistics-card-1 overflow-hidden">
                <div class="card-body text-center">
                    <i class="ph-duotone ph-warning f-32 mb-2"></i>
                    <h6>Overdue Items</h6>
                    <h3 class="f-w-300">{{ $overdueItems ?? '0' }}</h3>
                </div>
            </div>
        </div>

        <!-- Performance Metrics -->
        <div class="col-md-4 col-xl-4 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>Performance Metrics</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Active Loans: <b>{{ $activeLoans ?? '0' }}</b></li>
                        <li class="list-group-item">System Uptime: <b>{{ $systemUptime ?? '99.99%' }}</b></li>
                        <li class="list-group-item">Pending Approvals: <b>{{ $pendingApprovals ?? '0' }}</b></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- User Statistics -->
        <div class="col-md-4 col-xl-4 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>User Statistics</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Admin: <b>{{ $userRoles['admin'] ?? '0' }}</b></li>
                        <li class="list-group-item">Staff: <b>{{ $userRoles['staff'] ?? '0' }}</b></li>
                        <li class="list-group-item">Student: <b>{{ $userRoles['student'] ?? '0' }}</b></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="col-md-4 col-xl-4 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>Recent Activities</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($recentActivities ?? [] as $activity)
                            <li class="list-group-item">{{ $activity }}</li>
                        @endforeach
                        @if(empty($recentActivities))
                            <li class="list-group-item text-muted">No recent activities.</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <div class="row mt-4">
        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                    <h5>Recent Users</h5>
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
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h2 class="mb-3"><b>4.7<small class="text-muted f-18">/5</small></b></h2>
                        <div class="star mb-3 f-20">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star-half-alt text-warning"></i>
                        </div>
                    </div>
                    <div class="row align-items-center g-3 mb-2">
                        <div class="col-auto">
                            <h6 class="mb-0">5 <i class="fas fa-star text-warning"></i></h6>
                        </div>
                        <div class="col">
                            <div class="progress" style="height: 8px">
                                <div class="progress-bar bg-primary" style="width: 70%"></div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <p class="mb-0 text-muted">384</p>
                        </div>
                    </div>
                    <div class="row align-items-center g-3 mb-2">
                        <div class="col-auto">
                            <h6 class="mb-0">4 <i class="fas fa-star text-warning"></i></h6>
                        </div>
                        <div class="col">
                            <div class="progress" style="height: 8px">
                                <div class="progress-bar bg-primary" style="width: 55%"></div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <p class="mb-0 text-muted">145</p>
                        </div>
                    </div>
                    <div class="row align-items-center g-3 mb-2">
                        <div class="col-auto">
                            <h6 class="mb-0">3 <i class="fas fa-star text-warning"></i></h6>
                        </div>
                        <div class="col">
                            <div class="progress" style="height: 8px">
                                <div class="progress-bar bg-primary" style="width: 40%"></div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <p class="mb-0 text-muted">24</p>
                        </div>
                    </div>
                    <div class="row align-items-center g-3 mb-2">
                        <div class="col-auto">
                            <h6 class="mb-0">2 <i class="fas fa-star text-warning"></i></h6>
                        </div>
                        <div class="col">
                            <div class="progress" style="height: 8px">
                                <div class="progress-bar bg-primary" style="width: 25%"></div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <p class="mb-0 text-muted">1</p>
                        </div>
                    </div>
                    <div class="row align-items-center g-3">
                        <div class="col-auto">
                            <h6 class="mb-0">1 <i class="fas fa-star text-warning"></i></h6>
                        </div>
                        <div class="col">
                            <div class="progress" style="height: 8px">
                                <div class="progress-bar bg-primary" style="width: 10%"></div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <p class="mb-0 text-muted">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-8">
            <div class="card table-card">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                    <h5>Recent Users</h5>
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
                <div class="card-body py-2 px-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless table-sm mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-inline-block align-middle">
                                            <img src="{{ URL::asset('build/images/user/avatar-1.jpg') }}" alt="user image"
                                                class="img-radius align-top m-r-15" style="width:40px;">
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0">Quinn Flynn</h6>
                                                <p class="m-b-0">Android developer</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0"><i class="ph-duotone ph-circle text-warning f-12"></i> 11 may
                                            12:30</p>
                                    </td>
                                    <td class="text-end">
                                        <button class="btn avtar avtar-xs btn-light-danger"><i
                                                class="ti ti-x"></i></button>
                                        <button class="btn avtar avtar-xs btn-light-success"><i
                                                class="ti ti-check"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-inline-block align-middle">
                                            <img src="{{ URL::asset('build/images/user/avatar-2.jpg') }}" alt="user image"
                                                class="img-radius align-top m-r-15" style="width:40px;">
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0">Garrett Winters</h6>
                                                <p class="m-b-0">Android developer</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0"><i class="ph-duotone ph-circle text-success f-12"></i> 11 may
                                            12:30</p>
                                    </td>
                                    <td class="text-end">
                                        <button class="btn avtar avtar-xs btn-light-danger"><i
                                                class="ti ti-x"></i></button>
                                        <button class="btn avtar avtar-xs btn-light-success"><i
                                                class="ti ti-check"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-inline-block align-middle">
                                            <img src="{{ URL::asset('build/images/user/avatar-3.jpg') }}" alt="user image"
                                                class="img-radius align-top m-r-15" style="width:40px;">
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0">Ashton Cox</h6>
                                                <p class="m-b-0">Android developer</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0"><i class="ph-duotone ph-circle text-primary f-12"></i> 11 may
                                            12:30</p>
                                    </td>
                                    <td class="text-end">
                                        <button class="btn avtar avtar-xs btn-light-danger"><i
                                                class="ti ti-x"></i></button>
                                        <button class="btn avtar avtar-xs btn-light-success"><i
                                                class="ti ti-check"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-inline-block align-middle">
                                            <img src="{{ URL::asset('build/images/user/avatar-4.jpg') }}" alt="user image"
                                                class="img-radius align-top m-r-15" style="width:40px;">
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0">Cedric Kelly</h6>
                                                <p class="m-b-0">Android developer</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0"><i class="ph-duotone ph-circle text-danger f-12"></i> 11 may
                                            12:30</p>
                                    </td>
                                    <td class="text-end">
                                        <button class="btn avtar avtar-xs btn-light-danger"><i
                                                class="ti ti-x"></i></button>
                                        <button class="btn avtar avtar-xs btn-light-success"><i
                                                class="ti ti-check"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
@endsection

@section('scripts')
    <!-- [Page Specific JS] start -->
    <script src="{{ URL::asset('build/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/plugins/jsvectormap.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/plugins/world.js') }}"></script>
    <script src="{{ URL::asset('build/js/plugins/world-merc.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/dashboard-default.js') }}"></script>
    <!-- [Page Specific JS] end -->
@endsection
