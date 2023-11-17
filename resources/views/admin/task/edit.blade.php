@extends('admin.layouts.admin')

@section('title', 'Edit Assignment Details')
@section('css')

@endsection
@section('admin')
    <div class="row">

        <div class="col-lg-8 col-xl-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('admin.user.updateActiveTask', $task)}}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>
                                Edit Assignment Details for <small class="text-bg-info p-1">{{$task->user->name}}</small>
                        </h5>
                            <input type="hidden" name="user_id" value="{{ $task->user_id }}">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title')  is-invalid @enderror"
                                           id="title" placeholder="Assignment title .." name="title" value="{{ old
                                           ('title', $task->title) }}">
                                    @error('title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Start Date </label>
                                    <input type="date" class="form-control @error('start_date')  is-invalid @enderror"
                                            id="start_date" placeholder="Start date .." name="start_date"
                                            value="{{ $task->start_date->format('Y-m-d') }}">
                                    @error('start_date')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input type="date" class="form-control @error('end_date')  is-invalid @enderror"
                                           id="end_date" placeholder="Stop date .." name="end_date"
                                           value="{{ $task->end_date->format('Y-m-d') }}">
                                    @error('end_date')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Assignment Description </label>
                                    <textarea  class="form-control @error('description')  is-invalid @enderror"
                                              id="editor" placeholder="Assignment Description ..." name="description">{!! e(nl2br($task->description))
                                       !!}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="additional_file" class="form-label">Additional Information (optional)</label>
                                    <input type="file" class="form-control @error('additional_file')  is-invalid @enderror" id="additional_file" name="additional_file">
                                    @error('additional_file')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">

                                    @if($task->additional_file)
                                        <label for="" class="form-label">Additional File</label>
                                        @if(pathinfo($task->additional_file, PATHINFO_EXTENSION)
                                        === 'pdf')
                                            <!-- Display PDF -->
                                            <a href="{{ asset($task->additional_file) }}" target="_blank">View PDF</a>
                                        @else
                                            <!-- Display Image -->
                                            <a href="{{ asset($task->additional_file) }}" download>
                                                <img src="{{ asset($task->additional_file) }}" alt="Additional File" class="img-fluid">
                                            </a>
                                        @endif
                                    @else
                                        <label for="" class="form-label">No additional file</label>
                                    @endif
                                </div>
                            </div>

                        </div> <!-- end row -->



                        <div class="text-end">
                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
    <!-- end row -->



@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>


@endsection
