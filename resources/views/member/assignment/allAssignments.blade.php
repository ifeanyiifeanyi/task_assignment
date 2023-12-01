@extends('member.layouts.members')

@section('title', "All Assignments" )
@section('css')

@endsection

@section('members')

    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
        <div class="blog-details-content">
            <div class="news-block-one">
                <div class="inner-box">

                    <div class="lower-content">
                        <h3>All Previous Assignments</h3>
                        <hr>
                        <div class="table-responsive">
                            @if($tasks->count())
                                <table class="table table-hover">
                                    <tr>
                                        <th class="text-primary">s/n</th>
                                        <th class="text-primary">Title</th>
                                        <th class="text-primary">Start Date</th>
                                        <th class="text-primary">End Date</th>
                                        <th class="text-primary">Files</th>
                                        <th>View</th>
                                    </tr>
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <a href="{{route('member.previousAssignmentDetails.view', $task)}}"
                                                   class="link">
                                                    {{$task->title}}
                                                </a>
                                            </td>
                                            <td>{{$task->start_date->format('F j, Y')}}</td>
                                            <td>{{$task->end_date->format('F j, Y')}}</td>
                                            <td>
                                                @if($task->additional_file)
                                                    <a href="{{ asset($task->additional_file) }}" target="_blank">View</a>

                                                @else
                                                    No files
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{route('member.previousAssignmentDetails.view', $task)}}"
                                                   class="btn btn-primary">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <div class="text-info">No active assignment, try again later.
                                    <a href="{{route('member.profile.view')}}" class="btn btn-outline-info">Profile</a>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>


        </div>






    </div>
@endsection





@section('js')

@endsection
