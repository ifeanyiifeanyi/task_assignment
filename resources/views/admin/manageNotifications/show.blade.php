@extends('admin.layouts.admin')

@section('title', $notice->title)
@section('css')

@endsection
@section('admin')
    <div class="row">
        <div class="col-md-6 col-xl-10 mx-auto">
            <div class="card bg-gradient shadow">
                <a href="{{route('admin.notification.view')}}" class="btn btn-primary w-25">View notification</a>
                <div class="card-body">
                    @if($notice->count())
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <td>{{$notice->title}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h3 class="text-center">Content</h3>
                                        {!! $notice->content !!}
                                    </td>
                                </tr>
                                </thead>

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
