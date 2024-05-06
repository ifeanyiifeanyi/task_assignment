@extends('admin.layouts.admin')

@section('title', 'Assignment Archives')
@section('css')

@endsection
@section('admin')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(!$tasks->count())
                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                            No data available
                        </div>
                    @else
                        <div class="table-responsive">
                            <table id="" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>s/n</th>
                                <th>Assignment Destination</th>
                                <th>User</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>profile image</th>
                                <th>Start Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{Str::title($task->location)}}</td>
                                    <td>{{Str::title($task->user->name)}}</td>
                                    <td>{{$task->user->email}}</td>
                                    <td>{{$task->user->phone}}</td>
                                    <td>
                                        <img width="79"class="img-thumbnail img-fluid img-responsive"
                                             src="{{$task->user->photo ? asset($task->user->photo) : asset('no_image.jpg')}}" alt="">
                                    </td>
                                    <td>{{$task->getYearStartMonth()}}</td>
                                    <td>
                                        <div class="btn-group mr-2" role="group" aria-label="First group">

                                                <a href="{{ route('admin.restore.task', $task) }}" class="btn btn-primary waves-effect waves-light mr-2">
                                                    Restore
                                                </a>
                                            <form id="delete" action="{{route('admin.forceDelete.task',
                                                $task)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger waves-effect waves-light mr-2 ">
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
                    @endif


                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

@endsection
@section('script')
    <script>
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                let link = $(this).data("id");
                console.log({
                    link
                });

                Swal.fire({
                    title: 'Are you sure?'
                    , text: "You are about to delete this assignment permanently!"
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

    <script>
        $(function() {
            $(document).on('click', '#restore', function(e) {
                e.preventDefault();
                let link = $(this).data("id");
                console.log({
                    link
                });

                Swal.fire({
                    title: 'Are you sure?'
                    , text: "Are you sure, you want to restore this assignment!"
                    , icon: 'warning'
                    , showCancelButton: true
                    , confirmButtonColor: '#3085d6'
                    , cancelButtonColor: '#d33'
                    , confirmButtonText: 'Yes, restore assignment!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        if ($("#stopAssignment").submit()) {
                            Swal.fire(
                                'Restored!'
                                , 'Assignment restored!.'
                                , 'success'
                            )
                        }
                    }
                })
            })

        })

    </script>



@endsection

