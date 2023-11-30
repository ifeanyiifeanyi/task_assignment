@extends('admin.layouts.admin')

@section('title', 'Notifications')
@section('css')

@endsection
@section('admin')
    <div class="row">
        <div class="col-md-6 col-xl-10 mx-auto">
            <div class="card bg-gradient shadow">
                <a href="{{route('admin.notification.create')}}" class="btn btn-primary w-25">Create notification</a>
                <div class="card-body">
                    @if($notifications->count())
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>s/n</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($notifications as $notification)
                                      <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td>{{$notification->title}}</td>
                                          <td>{{$notification->created_at->format('F j, Y')}}</td>

                                          <td>
                                              <div class="btn-group">
                                                  <a href="" class="btn btn-primary">View Details</a>
                                                  <a href="" class="btn btn-info">edit</a>
                                                  <a href="" class="btn btn-danger">Del</a>
                                              </div>
                                          </td>
                                      </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="alert alert-info">
                        No Notification at the moment, try again later.
                    </div>
                    @endif
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->


    </div>
    <!-- end row -->



@endsection
@section('js')


@endsection
