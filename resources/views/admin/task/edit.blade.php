@extends('admin.layouts.admin')

@section('title', 'Edit Assignment Details')
@section('css')
<style>
    .loader {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.5);
        /* semi-transparent white */
        z-index: 9999;
        /* make sure it's above other elements */
        display: none;
        /* hide initially */
    }

    .loader::after {
        content: '';
        display: block;
        position: absolute;
        top: 50%;
        left: 50%;
        width: 60px;
        height: 60px;
        margin: -30px 0 0 -30px;
        border-radius: 50%;
        border: 6px solid #f3f3f3;
        /* Light grey */
        border-top: 6px solid #3498db;
        /* Blue */
        -webkit-animation: spin 1s linear infinite;
        /* Safari */
        animation: spin 1s linear infinite;
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
@endsection
@section('admin')
<div class="row">

    <div class="col-lg-8 col-xl-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{route('admin.user.updateActiveTask', $task)}}"
                    enctype="multipart/form-data" id="edit-task-form">
                    @csrf
                    @method('put')
                    <h5 class="mb-4 text-uppercase text-muted"><i class="mdi mdi-account-circle me-1"></i>
                        Edit Assignment Details, <b class="text-dark">{{$task->user->name}}</b>
                    </h5>
                    <input type="hidden" name="user_id" value="{{ $task->user_id }}">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="location" class="form-label">Destination</label>
                                <input type="text" class="form-control @error('location')  is-invalid @enderror"
                                    id="location" placeholder="Assignment location .." name="location" value="{{ old
                                           ('location', $task->location) }}">
                                @error('location')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="start_month" class="form-label">Start Month</label>
                                <input type="text" class="form-control @error('start_month')  is-invalid @enderror"
                                    id="start_month" placeholder="Start date .." name="start_month"
                                    value="{{ $task->start_month }}">
                                @error('start_month')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="year" class="form-label">Start Year</label>
                                <input type="text" class="form-control @error('year')  is-invalid @enderror" id="year"
                                    placeholder="Stop date .." name="year" value="{{ $task->year }}">
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
                                <textarea class="form-control @error('description')  is-invalid @enderror" id="editor"
                                    placeholder="Assignment Description ..." name="description">{!! e(nl2br($task->description))
                                       !!}</textarea>
                                @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="duration_in_words" class="form-label">Duration</label>
                                <input type="text"
                                    class="form-control @error('duration_in_words')  is-invalid @enderror"
                                    id="duration_in_words" placeholder="Duration, eg 5 months" name="duration_in_words"
                                    value="{{ old('duration_in_words', $task->duration_in_words) }}">
                                @error('duration_in_words')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="additional_file" class="form-label">Additional Information
                                    (optional)</label>
                                <input type="file" class="form-control @error('additional_file')  is-invalid @enderror"
                                    id="additional_file" name="additional_file">
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
                                    <img src="{{ asset($task->additional_file) }}" alt="Additional File"
                                        class="img-fluid">
                                </a>
                                @endif
                                @else
                                <label for="" class="form-label">No additional file</label>
                                @endif
                            </div>
                        </div>

                    </div> <!-- end row -->



                    <div class="text-end">
                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                class="mdi mdi-content-save"></i> Update Assignment</button>
                    </div>
                </form>
            </div>
        </div> <!-- end card-->

    </div> <!-- end col -->
    <div id="loader" class="loader"></div>
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
<script>
    ClassicEditor
            .create( document.querySelector( '#editor1' ) )
            .catch( error => {
                console.error( error );
            } );
</script>

<script>
    document.getElementById('edit-task-form').addEventListener('submit', function(event) {
        // Prevent the form from submitting normally
        event.preventDefault(); 

        // Show loader
        const loader = document.getElementById('loader');
        loader.style.display = 'block';

        // Submit the form
        this.submit();
    });
</script>

@endsection