@extends('admin.layouts.admin')

@section('title', 'All Active Assignment')
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
                                <th>Destination</th>
                                <th>User</th>
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
                                    <td>{{$task->getYearStartMonth()}}</td>
                                    <td>
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <a title="View assignment" href="{{route('admin.user.activeTask', $task)}}"
                                               class="btn btn-info
                                            waves-effect
                                            waves-light mr-2 ">
                                                View
                                            </a>
                                            <a title="Edit assignment" href="{{route('admin.user.editActiveTask', $task)
                                            }}" class="btn
                                            btn-primary
                                            waves-effect
                                            waves-light mr-2 ">
                                                Edit
                                            </a>
                                                <form id="stopAssignment" action="{{route('admin.user.endActiveTask',
                                                $task)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button title="End the Assignment" type="submit" class="btn btn-soft-warning
                                                    waves-effect
                                                    waves-light mr-2 ">
                                                        End
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

    <script>
        $(function() {
            $(document).on('click', '#stopAssignment', function(e) {
                e.preventDefault();
                let link = $(this).data("id");
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
                    , confirmButtonText: 'Yes, end the assignment!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        if ($("#stopAssignment").submit()) {
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
