@extends('admin.layouts.admin')

@section('title', $user->name . ' Details')
@section('css')

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
                                                @if($user->tasks->where('status', 'active')->isNotEmpty())
                                                    <!-- Display if user has an active assignment -->
                                                    @foreach($user->tasks->where('status', 'active') as $task)
                                                        <tr>
                                                            <td colspan="2" class="text-success"><p class="leading-relaxed">
                                                                    Active on
                                                                    going assignment </p></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-info">Assignment Title</th>
                                                            <td>{{ $task->title }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-info">Assignment Description</th>
                                                            <td>{!! $task->description !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-info">Start Date</th>
                                                            <td>{{ $task->start_date->format('F j, Y') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-info">End Date</th>
                                                            <td>{{ $task->end_date->format('F j, Y') ?? 'Not available ..' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-info">Additional File</th>
                                                            <td>
                                                                @if($task->additional_file)
                                                                    @if(pathinfo($task->additional_file, PATHINFO_EXTENSION) == 'pdf')
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
                                                    @endforeach
                                                @else
                                                    <!-- Display if user doesn't have an active assignment -->
                                                    <tr>
                                                        <th></th>
                                                        <td>
                                                            <a href="{{ route('admin.user.task', $user) }}" class="btn btn-success waves-effect waves-light mt-2">Assign Duties</a>
                                                        </td>
                                                    </tr>
                                                @endif
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


@endsection
