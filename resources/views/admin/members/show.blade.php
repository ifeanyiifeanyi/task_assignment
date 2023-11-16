@extends('admin.layouts.admin')

@section('title', $user->name . ' Details')
@section('css')
    <link href="{{ asset("") }}admin/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset("") }}admin/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/
css" />
    <link href="{{ asset("") }}admin/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset("") }}admin/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('admin')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(!$user->count())
                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                            No data available
                        </div>
                    @else
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card ribbon-box">
                                    @if($user->inter_dioceses == 1)
                                        <div class="bg-soft-info mx-auto mt-4 p-2"><span>Inter
                                                    Diocesan Member</span></div>
                                    @else
                                        <div class="bg-soft-primary shadow p-2 mx-auto
                                        mt-4"><span>Diocesan Member</span></div>
                                    @endif
                                    <div class="card-body">
                                        @if($user->inter_dioceses == 1)
                                            <div class="ribbon-two ribbon-two-info"><span>Inter</span></div>
                                        @else
                                            <div class="ribbon-two ribbon-two-success"><span>Diocesan</span></div>
                                        @endif

                                        <div class="table-responsive">

                                            <table class="table table-striped dt-responsive nowrap w-100">
                                                <thead>
                                                <tr>

                                                    <td colspan="2"><img class="img-fluid img-preview mx-auto"
                                                                         src="{{$user->photo ?
                                                    asset
                                                    ($user->photo)
                                                    : asset('no_image.jpg')}}" alt=""></td>
                                                </tr>
                                                <tr>
                                                    <th>Name: </th>
                                                    <td>{{$user->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Username: </th>
                                                    <td>{{$user->username}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email: </th>
                                                    <td>{{$user->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone: </th>
                                                    <td>{{$user->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Parish: </th>
                                                    <td>{{$user->parish ?? 'not available'}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Dioceses: </th>
                                                    <td>{{$user->dioceses ?? 'not available'}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Class: </th>
                                                    <td>{{$user->class ?? 'not available'}}</td>
                                                </tr>
                                                <tr>
                                                    <th>School: </th>
                                                    <td>{{$user->school ?? 'not available'}}</td>
                                                </tr>
                                                @if($user->inter_dioceses == 0)
                                                    <tr>
                                                        <th>Home Parish: </th>
                                                        <td>{{$user->home_parish ?? 'not available'}}</td>

                                                    </tr>
                                                    <tr>
                                                        <th>Parish of Residence: </th>
                                                        <td>{{$user->parish_of_residence ?? 'not available'}}</td>
                                                    </tr>

                                                @endif
                                                <tr>
                                                    <th></th>
                                                    <td><a href="{{route('admin.user.task', $user)}}" class="btn
                                                    btn-success waves-effect
                                                    waves-light
                                                    mt-2">Assign Duties</a></td>
                                                </tr>
                                                </thead>


                                                <tbody>

                                                </tbody>
                                            </table>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif


                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

@endsection
@section('script')

    <!-- third party js -->
    <script src="{{ asset("") }}admin/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset("") }}admin/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{ asset("") }}admin/assets/js/pages/datatables.init.js"></script>

@endsection
