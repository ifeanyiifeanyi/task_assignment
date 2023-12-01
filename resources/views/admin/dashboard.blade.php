@extends('admin.layouts.admin')

@section('title', 'Dashboard')
@section('css')

@endsection
@section('admin')
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card bg-gradient">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-sm bg-blue rounded shadow-lg">
                            <i class="fe-users avatar-title font-22 text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h3 class="text-dark my-1"><span data-plugin="counterup">{{$user_not_admin_count}}</span></h3>
                            <p class="text-muted mb-1">Total Members</p>
                        </div>
                    </div>
                </div>

            </div>
        </div> <!-- end card-->
    </div> <!-- end col -->

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-sm bg-success rounded shadow-lg">
                            <i class="fe-target avatar-title font-22 text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h3 class="text-dark my-1"><span data-plugin="counterup">{{$active_task}}</span></h3>
                            <p class="text-muted mb-1">Active Assignments</p>
                        </div>
                    </div>
                </div>

            </div>
        </div> <!-- end card-->
    </div> <!-- end col -->

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-sm bg-warning rounded shadow-lg">
                            <i class="fe-bar-chart-2 avatar-title font-22 text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h3 class="text-dark my-1"><span data-plugin="counterup">{{$user_admin_count}}</span></h3>
                            <p class="text-muted mb-1">Admin Members</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div> <!-- end col -->

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-sm bg-info rounded shadow-lg">
                            <i class="fe-cpu avatar-title font-22 text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h3 class="text-dark my-1"><span data-plugin="counterup">{{$tasks}}</span></h3>
                            <p class="text-muted mb-1">Assignment Records</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div> <!-- end col -->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-sm bg-info rounded shadow-lg">
                            <i class="fe-bell avatar-title font-22 text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h3 class="text-dark my-1"><span data-plugin="counterup">{{$notifications}}</span></h3>
                            <p class="text-muted mb-1">Notification Records</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->



@endsection
@section('js')


@endsection
