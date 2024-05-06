@extends('admin.layouts.admin')

@section('title', 'Edit Notification')
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
    <div class="col-md-6 col-xl-10 mx-auto">
        <div class="card bg-gradient shadow">
            <a href="{{ route('admin.notification.view') }}" class="btn btn-primary w-25">View notifications</a>
            <div class="card-body">
                <form action="{{ route('admin.notification.update', $notification) }}" method="post" id="notification-form">
                    @csrf
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title </label>
                            <input type="text" class="form-control @error('title')  is-invalid @enderror" id="title"
                                placeholder="Title ..." name="title" value="{{ old('title', $notification->title) }}">
                            @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="content" class="form-label">Notification Content </label>
                            <textarea class="form-control @error('content')  is-invalid @enderror" id="editor"
                                placeholder="Description ..."
                                name="content">{{ old('content', $notification->content) }}</textarea>
                            @error('content')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                class="mdi mdi-content-save"></i> Save</button>
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
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
</script>
<script>
    document.getElementById('notification-form').addEventListener('submit', function(event) {
            // Prevent the form from submitting normally
            event.preventDefault(); 
    
            // Show loader
            const loader = document.getElementById('loader');
            loader.style.display = 'block';
    
            // Submit the form
            this.submit();
        });
</script>
<script>
    document.getElementById('notification-form').addEventListener('submit', function(event) {
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