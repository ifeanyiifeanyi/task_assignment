@extends('admin.layouts.admin')

@section('title', 'All Members')
@section('css')

@endsection
@section('admin')
<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(!$users->count())
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
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <p> {{ Str::ucfirst($user->name) }}</p>

                                    @if($user->tasks->where('status', 'active')->first())
                                        <p class="text-bg-success p-1 rounded">Active Assignment, on going ..</p>
                                    @else
                                        <p><a href="{{route('admin.user.task', $user)}}" class="btn btn-primary
                                    waves-effect waves-light
                                    mt-2">Assign</a></p>
                                    @endif
                                </td>
                                <td>{{ Str::ucfirst($user->username) }}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>
                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                        <a href="{{route('admin.member.view', $user->username)}}" class="btn btn-primary
                                            waves-effect
                                            waves-light mr-2 ">
                                            View
                                        </a>
                                        <a href="{{route('admin.member.edit', $user->username)}}" class="btn btn-info
                                            waves-effect waves-light btn-group-sm">
                                            Edit
                                        </a>
                                        @if(!$user->tasks->where('status', 'active')->isNotEmpty())
                                        <form id="delete" action="{{ route('admin.member.delete', $user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger waves-effect waves-light btn-group-sm
                                                ">
                                                Delete
                                            </button>
                                        </form>
                                        @else
                                            <a href="#!" title="User has an active assignment and cannot be deleted"
                                               disabled="true" class="btn btn-success
                                            waves-effect waves-light btn-group-sm">
                                                Active
                                            </a>
                                        @endif

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
