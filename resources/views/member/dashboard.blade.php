@extends('member.layouts.members')

@section('title', "Dashboard" )
@section('css')

@endsection

@section('members')

<div class="col-lg-8 col-md-12 col-sm-12 content-side">
    <div class="blog-details-content">
        <div class="news-block-one">
            <div class="inner-box">

                <div class="lower-content">
                    <h3>Activity Logs</h3>
                    <hr>
                    <div class="blog-details-content">
                        <div class="news-block-one">
                            <div class="row">
                                @if($task > 0)
                                <div class="col-md-6 mb-3">
                                        <a href="{{route('member.active.assignment')}}" class="btn btn-lg btn-outline-info w-100">New Active
                                            Assignment
                                        <sup
                                                class="bg-success p-1 rounded text-light">Active</sup>
                                        </a>

                                </div>
                                @else
                                    <div class="col-md-6 mb-3">
                                        <a href="#!" class="btn btn-lg btn-outline-warning w-100">
                                            No Active Assignment
                                        </a>
                                    </div>
                                @endif
                                @if($notifications > 0)
                                <div class="col-md-6 mb-3">
                                        <a href="{{route('member.notice.view')}}" class="btn btn-lg btn-outline-info w-100">Notifications <sup
                                                class="bg-success p-1 rounded">
                                                <i class="fa fa-bells text-light"></i>
                                            </sup>
                                        </a>
                                </div>
                                    @else
                                        <div class="col-md-6 mb-3">
                                            <a href="#!" class="btn btn-lg btn-outline-warning w-100">

                                                 Notifications
                                            </a>
                                        </div>
                                    @endif
                            </div>

                        </div>
                    </div>





                </div>
            </div>
        </div>


    </div>






</div>
@endsection





@section('js')

@endsection
