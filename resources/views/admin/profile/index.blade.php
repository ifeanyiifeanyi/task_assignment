@extends('admin.layouts.admin')

@section('title', Str::ucfirst($user->username) .' profile')
@section('css')

@endsection
@section('admin')
<div class="row">
    <div class="col-lg-4 col-xl-4">
        <div class="card text-center">
            <div class="card-body">
                <img src="{{ $user->photo ? asset($user->photo) : asset('no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                <h4 class="mb-0">{{ Str::ucfirst($user->name) }}</h4>
                <p class="text-muted">{{ Str::ucfirst($user->username) }}</p>

                <div class="text-start mt-3">
                    <h4 class="font-13 text-uppercase">About Me :</h4>

                    <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">{{ Str::ucfirst($user->name) }}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">{{ Str::ucfirst($user->phone) }}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">{{ Str::ucfirst($user->email) }}</span></p>

                    <p class="text-muted mb-1 font-13"><strong>Adress :</strong> <span class="ms-2">{{ Str::ucfirst($user->address ?? 'not available') }}</span></p>

                    <p class="text-muted mb-1 font-13"><strong>Parish :</strong> <span class="ms-2">{{ Str::ucfirst($user->parish ?? 'not available') }}</span></p>
                    <p class="text-muted mb-1 font-13"><strong>Home Parish :</strong> <span class="ms-2">{{ Str::ucfirst($user->home_parish ?? 'not available') }}</span></p>
                    <p class="text-muted mb-1 font-13"><strong>Parish of Residence :</strong> <span class="ms-2">{{ Str::ucfirst($user->parish_of_residence ?? 'not available') }}</span></p>
                    <p class="text-muted mb-1 font-13"><strong>Dioceses :</strong> <span class="ms-2">{{ Str::ucfirst($user->dioceses ?? 'not available') }}</span></p>
                    <p class="text-muted mb-1 font-13"><strong>School :</strong> <span class="ms-2">{{ Str::ucfirst
                    ($user->school ?? 'not available') }}</span></p>
                    <p class="text-muted mb-1 font-13"><strong>Class :</strong> <span class="ms-2">{{ Str::ucfirst
                    ($user->class ?? 'not available') }}</span></p>
                </div>
            </div>
        </div> <!-- end card -->

    </div> <!-- end col-->

    <div class="col-lg-8 col-xl-8">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('admin.profile.update', $user) }}" enctype="multipart/form-data">
                    @csrf
                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name')  is-invalid @enderror" id="name" placeholder="Surname Firstname, Other names" name="name" value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username" placeholder="Enter username" name="username" value="{{ old('username', $user->username) }}">
                                @error('username')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone number</label>
                                <input type="tel" class="form-control  @error('phone')  is-invalid @enderror" id="phone" placeholder="Enter phone number" name="phone" value="{{ old('phone', $user->phone) }}">
                                @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control  @error('email')  is-invalid @enderror" id="email" placeholder="Enter email address" name="email" value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control  @error('address')  is-invalid @enderror" name="address" id="address" placeholder="Enter address" value="{{ old('address', $user->address) }}">
                                @error('address')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="parish" class="form-label">Parish</label>
                                <input type="text" class="form-control @error('parish')  is-invalid @enderror" id="parish" placeholder="Enter parish" name="parish" value="{{ old('parish', $user->parish) }}">
                                @error('parish')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="home_parish" class="form-label">Home parish</label>
                                <input type="text" class="form-control @error('home_parish')  is-invalid @enderror" id="home_parish" placeholder="Enter home parish" name="home_parish" value="{{ old('home_parish', $user->home_parish) }}">
                                @error('home_parish')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="parish_of_residence" class="form-label">Parish of residence</label>
                                <input type="text" class="form-control @error('parish_of_residence')  is-invalid @enderror" name="parish_of_residence" id="parish_of_residence" placeholder="Enter parish of residence" value="{{ old('parish_of_residence', $user->parish_of_residence) }}">
                                @error('parish_of_residence')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="dioceses" class="form-label">Dioceses</label>
                                <input type="text" class="form-control @error('dioceses')  is-invalid @enderror" id="dioceses" placeholder="Enter dioceses" name="dioceses" value="{{ old('dioceses', $user->dioceses) }}">
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="class" class="form-label">Class</label>
                                <input type="text" class="form-control @error('class')  is-invalid @enderror"
                                       id="class" placeholder="Enter current class in school" name="class"
                                       value="{{ old('class', $user->class)
                                           }}">
                                @error('class')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="school" class="form-label">School</label>
                                <input type="text" class="form-control @error('school')  is-invalid @enderror"
                                       id="school" placeholder="Enter current school" name="school" value="{{ old
                                           ('school', $user->school) }}">
                                @error('school')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>
                        </div> <!-- end col -->
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="photo" class="form-label">Profile image</label>
                                <input onchange="readURL(this);" type="file" class="form-control @error('photo')  is-invalid @enderror"
                                        id="photo" name="photo">
                                @error('photo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 text-center">
                                <label for="photo" class="form-label">Current Image</label> <br>
                                <img id="currentImage" class="img-responsive img-fluid w-50" src="{{ $user->photo ? asset
                                ($user->photo) : asset('no_image.jpg') }}" alt="">
                            </div>
                        </div> <!-- end col -->
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle the checkbox change event
            $("#inter_dioceses").change(function () {
                if ($(this).is(":checked")) {
                    // Checkbox is checked, remove the parish sections from the DOM
                    $("#parishSections").remove();
                }
            });
        });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $('#currentImage').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


@endsection
