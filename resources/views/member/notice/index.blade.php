@extends('member.layouts.members')

@section('title', "Notifications" )
@section('css')

@endsection

@section('members')

    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
        <div class="blog-details-content">
            <div class="news-block-one">
                <div class="inner-box">

                    <div class="lower-content">
                        <h3>All Notification</h3>
                        <hr>
                        <div class="table-responsive">
                            @if($notifications->count())
                                <table class="table table-hover">
                                    <tr>
                                        <th class="text-primary">s/n</th>
                                        <th class="text-primary">Title</th>
                                        <th class="text-primary">Date</th>
                                        <th class="text-primary">View</th>
                                    </tr>
                                    @foreach($notifications as $notice)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <a href="{{route('member.notice.show', $notice)}}" class="link">
                                                    {{$notice->title}}
                                                </a>
                                            </td>
                                            <td>{{$notice->created_at->format('F j, Y')}}</td>
                                            <td>
                                                <a href="{{route('member.notice.show', $notice)}}" class="btn
                                                btn-primary">Read</a>

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





@section('script')

@endsection
