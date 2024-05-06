@extends('member.layouts.members')

@section('title', $notice->title )
@section('css')

@endsection

@section('members')

    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
        <div class="blog-details-content">
            <div class="news-block-one">
                <div class="inner-box">
                    <a href="{{route('member.notice.view')}}" class="btn btn-info"> All notifications</a>
                    <div class="lower-content">
                        <h3>{{$notice->title}}!!!</h3>
                        <hr>
                        <div class="table-responsive">
                            @if($notice)
                                <table class="table table-hover">
                                    <tr>
                                        <th class="text-info">Title</th>
                                        <td>{{Str::ucfirst($notice->title)}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h4>Details</h4>
                                            {!! $notice->content !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-info">Notice Date</th>
                                        <td>{{$notice->created_at->format('F j, Y')}}</td>
                                    </tr>

                                </table>
                            @else
                                <div class="text-info">No notification, try again later.
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
