@extends('admin.layouts.admin')

@section('title', 'Assign member')
@section('css')

@endsection
@section('admin')
    <div class="row">

        <div class="col-lg-8 col-xl-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('admin.task.store')}}" enctype="multipart/form-data">
                        @csrf
                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>
                            @isset($user)
                            Create new assignment for   <b class="text-bg-blue p-1">{{$user->name}} </b>
                            @else
                                Create new Assignment
                            @endisset
                        </h5>
                        @isset($user)
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                        @else
                            <!-- If no specific user, show the select tag -->
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="user_id" class="form-label">Select user</label>
                                        <select class="form-control @error('user_id')  is-invalid @enderror" id="user_id" name="user_id">
                                            <option value="" disabled selected>Select user</option>
                                            @if($users->count())
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            @else
                                                <option value="member">Members not available</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endisset

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title')  is-invalid @enderror"
                                           id="title" placeholder="Assignment title .." name="title" value="{{ old
                                           ('title') }}">
                                    @error('title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input  min="{{ date('Y-m-d', strtotime('tomorrow')) }}" type="date" class="form-control @error('start_date')  is-invalid @enderror"
                                           id="start_date" placeholder="Start date .." name="start_date" value="">
                                    @error('start_date')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input type="date" class="form-control @error('end_date')  is-invalid @enderror"
                                           id="end_date" placeholder="Stop date .." name="end_date" value="">
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
                                               id="editor" placeholder="Assignment Description ..." name="description" value="{{
                                       old('description') }}"></textarea>
                                    @error('description')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="email_description" class="form-label">Description
                                            <span class="text-info text-sm">Content goes to mail notification as
                                                additional information, but <b>Optional</b> </span>
                                        </label>
                                        <textarea  class="form-control @error('email_description')  is-invalid
                                        @enderror"
                                                   id="editor1" placeholder="This email description is optional"
                                                   name="email_description" value="{{
                                       old('email_description') }}"></textarea>
                                        @error('email_description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="additional_file" class="form-label">Additional Information (optional)</label>
                                    <input type="file" class="form-control @error('additional_file')  is-invalid @enderror" id="additional_file" name="additional_file">
                                    @error('additional_file')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
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
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor1' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>


@endsection
