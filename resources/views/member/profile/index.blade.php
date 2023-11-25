@extends('member.layouts.members')

@section('title', auth()->user()->username. " Profile" )
@section('css')

@endsection

@section('members')

    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
        <div class="blog-details-content">
            <div class="news-block-one">
                <div class="inner-box">

                    <div class="lower-content">
                        <h3>Profile</h3>
                        <hr>

                        <!-- agent-details -->
                                <div class="agent-details-content">
                                    <div class="agents-block-one">
                                        <div class="inner-box mr-0" style="box-shadow: none">
                                            <figure class="image-box"><img
                                                    src="{{$user->photo ? asset($user->photo) : asset('no_image.jpg')}}"
                                                    alt=""></figure>
                                            <div class="content-box">
                                                <div class="upper clearfix">
                                                    <div class="title-inner pull-left">
                                                        <h4>{{$user->name}}</h4>
                                                        <span class="designation">
                                                            {{$user->username}},
                                                            @if($user->inter_dioceses === 0)
                                                                <em>Diocesan Member</em>
                                                            @else
                                                                <em>Inter Diocesan Member</em>

                                                            @endif
                                                        </span>
                                                    </div>

                                                </div>

                                                <ul class="info clearfix mr-0">
                                                    <li><i class="fab fa fa-envelope"></i><a
                                                            href="mailto:{{$user->email}}">{{$user->email}}</a></li>
                                                    <li><i class="fab fa fa-phone"></i><a
                                                            href="tel:{{$user->phone}}">{{$user->phone}}</a>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-address-card"></i>
                                                        {{$user->address ?? 'Not available'}}
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-hospital"></i>
                                                        {{$user->parish ?? 'Not available'}}
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-warehouse"></i>
                                                        {{$user->dioceses ?? 'Not available'}}
                                                    </li>
                                                    @if($user->inter_dioceses === 0)
                                                        <li>
                                                            <i class="fas fa-igloo"></i>
                                                            {{$user->home_parish ?? 'Not available'}}
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-hospital-alt"></i>
                                                            {{$user->parish_of_residence ?? 'Not available'}}
                                                        </li>
                                                    @endif
                                                    <li>
                                                        <i class="fas fa-university"></i>
                                                        {{$user->school ?? 'Not available'}}
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-scroll"></i>
                                                        {{$user->class ?? 'Not available'}}
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-long-arrow-alt-right"></i>
                                                        <div class="btn-group">
                                                            <a href="" class="btn-primary text-light shadow btn">Update Profile</a>
                                                            <a href="{{route('member.password.view')}}" class="btn-info text-light shadow
                                                            btn">Update
                                                                Password</a>
                                                        </div>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <!-- agent-details end -->

                    </div>
                </div>
            </div>


        </div>






    </div>
@endsection





@section('js')

@endsection
