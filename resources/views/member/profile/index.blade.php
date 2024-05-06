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
                                            <div class="row">
                                                <div class="col-md-4">
                                                <img class="img-fluid img-thumbnail" src="{{$user->photo ? asset($user->photo) :
                                                asset('no_image.jpg')}}" alt="profile">
                                                </div>
                                                <div class="col-md-8 w-100">
                                                    <div class="">
                                                        <h4>{{$user->name}}</h4>
                                                        <span class="">
                                                            {{$user->username}},
                                                            @if($user->inter_dioceses === 0)
                                                                <em>Diocesan Member</em>
                                                            @else
                                                                <em>Inter Diocesan Member</em>

                                                            @endif
                                                        </span>
                                                    </div>
                                                    <hr>

                                                <ul class="list-group ">
                                                    <li class="mb-3">
                                                        <i class="fab fa fa-envelope mr-2 text-light bg-primary
                                                        rounded p-1"></i>
                                                        <a
                                                            href="mailto:{{$user->email}}"> {{$user->email}}
                                                        </a>
                                                    </li>
                                                    <li  class="mb-3">
                                                        <i class="fab fa fa-phone mr-2 text-light bg-primary
                                                        rounded p-1"></i>
                                                        <a
                                                            href="tel:{{$user->phone}}"> {{$user->phone}}
                                                        </a>
                                                    </li>
                                                    <li  class="mb-3">
                                                        <i class="fas fa-address-card mr-2 text-light bg-dark
                                                        rounded p-1"></i>
                                                        {{$user->address ?? 'Not available'}}
                                                    </li>
                                                    <li  class="mb-3">
                                                        <i class="fas fa-hospital mr-2 text-light bg-dark
                                                        rounded p-1"></i>
                                                        {{$user->parish ?? 'Not available'}}
                                                    </li>
                                                    <li  class="mb-3">
                                                        <i class="fas fa-warehouse mr-2 text-light bg-dark
                                                        rounded p-1"></i>
                                                        {{$user->dioceses ?? 'Not available'}}
                                                    </li>
                                                    @if($user->inter_dioceses === 0)
                                                        <li  class="mb-3">
                                                            <i class="fas fa-igloo mr-2 text-light bg-dark
                                                        rounded p-1"></i>
                                                            {{$user->home_parish ?? 'Not available'}}
                                                        </li>
                                                        <li  class="mb-3">
                                                            <i class="fas fa-hospital-alt mr-2 text-light bg-dark
                                                        rounded p-1"></i>
                                                            {{$user->parish_of_residence ?? 'Not available'}}
                                                        </li>
                                                    @endif
                                                    <li  class="mb-3">
                                                        <i class="fas fa-university mr-2 text-light bg-dark
                                                        rounded p-1"></i>
                                                        {{$user->school ?? 'Not available'}}
                                                    </li>
                                                    <li  class="mb-3">
                                                        <i class="fas fa-scroll mr-2 text-light bg-dark
                                                        rounded p-1"></i>
                                                        {{$user->class ?? 'Not available'}}
                                                    </li>

                                                </ul>
                                                    <hr>
                                                <div  class="mb-3">
                                                    <div class="btn-group">
                                                        <a href="{{route('member.view.updateProfile')}}" class="btn-primary text-light shadow
                                                        btn">Update Profile</a>
                                                        <a href="{{route('member.password.view')}}" class="btn-info text-light shadow
                                                        btn">Update
                                                            Password</a>
                                                    </div>

                                                </div>
                                                </div>
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
