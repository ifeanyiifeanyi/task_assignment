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
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>s/n</th>
                                <th>Title</th>
                                <th>User</th>
                                <th>Start Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{Str::ucfirst($task->title)}}</td>
                                    <td>{{Str::ucfirst($task->user->name)}}</td>
                                    <td>{{$task->start_date->format('F j, Y')}}</td>
                                    <td>
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <a href="{{route('admin.user.activeTask', $task)}}" class="btn btn-info
                                            waves-effect
                                            waves-light mr-2 ">
                                                View
                                            </a>
                                            <a href="" class="btn btn-primary
                                            waves-effect
                                            waves-light mr-2 ">
                                                Edit
                                            </a>
                                            <a href="" class="btn btn-danger
                                            waves-effect
                                            waves-light mr-2 ">
                                                Delete
                                            </a>
                                            <a href="" class="btn btn-soft-warning
                                            waves-effect
                                            waves-light mr-2 ">
                                                End Assignment
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>

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



@endsection
