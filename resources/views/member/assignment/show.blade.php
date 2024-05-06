@extends('member.layouts.members')

@section('title', "Assignment Details" )
@section('css')

@endsection

@section('members')

    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
        <div class="blog-details-content">
            <div class="news-block-one">
                <div class="inner-box">

                    <div class="lower-content">
                        <h3>Assignment Details</h3>
                        <hr>
                        <div class="table-responsive">
                            @if($task)
                                <table class="table table-hover">
                                    <tr>
                                        <th class="text-info">Title</th>
                                        <td>{{Str::ucfirst($task->title)}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-info">Status</th>
                                        <td>{{Str::ucfirst($task->status)}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h4>Details</h4>
                                            {!! $task->description !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-info">Start Date</th>
                                        <td>{{$task->start_date->format('F j, Y')}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-info">End Date</th>
                                        <td>{{$task->end_date->format('F j, Y') ?? 'Not Available '}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-info">Additional Information or file</th>
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

