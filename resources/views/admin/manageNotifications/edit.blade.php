@extends('admin.layouts.admin')

@section('title', 'Edit Notification')
@section('css')

@endsection
@section('admin')
    <div class="row">
        <div class="col-md-6 col-xl-10 mx-auto">
            <div class="card bg-gradient shadow">
                <a href="{{route('admin.notification.view')}}" class="btn btn-primary w-25">View notifications</a>
                <div class="card-body">
                    <form action="{{route('admin.notification.update', $notification)}}" method="post">
                        @csrf
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title </label>
                                <input type="text"  class="form-control @error('title')  is-invalid @enderror"
                                       id="title" placeholder="Title ..." name="title" value="{{
                                       old('title', $notification->title) }}">
                                @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="content" class="form-label">Notification Content </label>
                                <textarea  class="form-control @error('content')  is-invalid @enderror"
                                           id="editor" placeholder="Description ..." name="content">{{old('content', $notification->content) }}</textarea>
                                @error('content')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
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

