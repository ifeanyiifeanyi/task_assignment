@extends('admin.layouts.admin')

@section('title', $task->user->name . 'Assignment Details')
@section('css')

@endsection
@section('admin')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <a href="{{route('admin.all.task')}}" class="btn btn-outline-blue m-2 w-auto shadow" >All
                    Assignment</a>
                <div class="card-body">
                    @if(!$task->count())
                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                            No data available
                        </div>
                    @else
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card ribbon-box">
                                    @if($task->user->inter_dioceses === 1)
                                        <div class="bg-soft-info mx-auto mt-4 p-2"><span>Inter
                                                    Diocesan Member</span></div>
                                    @else
                                        <div class="bg-soft-primary shadow p-2 mx-auto
                                        mt-4"><span>Diocesan Member</span></div>
                                    @endif
                                    <div class="card-body">
                                        @if($task->user->inter_dioceses === 1)
                                            <div class="ribbon-two ribbon-two-info"><span>Inter</span></div>
                                        @else
                                            <div class="ribbon-two ribbon-two-success"><span>Diocesan</span></div>
                                        @endif

                                        <div class="table-responsive">

                                            <table class="table table-striped dt-responsive nowrap w-100">
                                                <p>Assignment Details for <b class="text-bg-info
                                                p-1">{{$task->user->name}}</b></p>
                                                <thead>
                                                <tr>

                                                    <td colspan="2"><img class="img-fluid img-preview mx-auto"
                                                                         src="{{$task->user->photo ?
                                                    asset
                                                    ($task->user->photo)
                                                    : asset('no_image.jpg')}}" alt=""></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><h3 class="text-info text-center underline">Assignment
                                                            Details .
                                                            .</h3></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-primary">Assignment Destination: </th>
                                                    <td>{{$task->location}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-primary">Description: </th>
                                                    <td>{!! nl2br($task->description) !!}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-primary">Start Date: </th>
                                                    <td>{{$task->getYearStartMonth()}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-primary">Additional File</th>
                                                    <td>
                                                        @if($task->additional_file)
                                                            @if(pathinfo($task->additional_file, PATHINFO_EXTENSION)
                                                            === 'pdf')
                                                                <!-- Display PDF -->
                                                                <a href="{{ asset($task->additional_file) }}" target="_blank">View PDF</a>
                                                            @else
                                                                <!-- Display Image -->
                                                                <a href="{{ asset($task->additional_file) }}" download>
                                                                    <img src="{{ asset($task->additional_file) }}" alt="Additional File" class="img-fluid">
                                                                </a>
                                                            @endif
                                                        @else
                                                            No additional file
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><h3 class="text-info text-center underline">User
                                                            Details .
                                                            .</h3></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-info">Name: </th>
                                                    <td>{{$task->user->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-info">Username: </th>
                                                    <td>{{$task->user->username}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-info">Email: </th>
                                                    <td>{{$task->user->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-info">Phone: </th>
                                                    <td>{{$task->user->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-info">Address: </th>
                                                    <td>{{$task->user->address ?? 'not available'}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-info">Parish: </th>
                                                    <td>{{$task->user->parish ?? 'not available'}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-info">Dioceses: </th>
                                                    <td>{{$task->user->dioceses ?? 'not available'}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-info">Class: </th>
                                                    <td>{{$task->user->class ?? 'not available'}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-info">School: </th>
                                                    <td>{{$task->user->school ?? 'not available'}}</td>
                                                </tr>
                                                @if($task->user->inter_dioceses === 0)
                                                    <tr>
                                                        <th>Home Parish: </th>
                                                        <td>{{$user->home_parish ?? 'not available'}}</td>

                                                    </tr>
                                                    <tr>
                                                        <th>Parish of Residence: </th>
                                                        <td>{{$user->parish_of_residence ?? 'not available'}}</td>
                                                    </tr>

                                                @endif
                                                </thead>
                                                <tbody>
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


@endsection
