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
                                                  <a href="{{route('admin.notification.show', $notification)}}" class="btn
                                                  btn-primary">View Details</a>
                                                  <a href="{{route('admin.notification.edit', $notification)}}" class="btn btn-info">edit</a>
                                                  <form id="delete" action="{{ route('admin.notification.delete', $notification) }}"
                                                        method="POST">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button type="submit" class="btn btn-danger waves-effect waves-light btn-group-sm
                                                ">
                                                          Delete
                                                      </button>
                                                  </form>
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
@section('script')
    <script>
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).data("id");
                console.log({
                    link
                });

                Swal.fire({
                    title: 'Are you sure?'
                    , text: "You won't be able to revert this!"
                    , icon: 'warning'
                    , showCancelButton: true
                    , confirmButtonColor: '#3085d6'
                    , cancelButtonColor: '#d33'
                    , confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        if ($("#delete").submit()) {
                            Swal.fire(
                                'Deleted!'
                                , 'Content deleted.'
                                , 'success'
                            )
                        }
                    }
                })
            })

        })

    </script>


@endsection
