@extends('admin.layouts.admin')

@section('title', 'Create member account')
@section('css')

@endsection
@section('admin')
    <div class="row">

        <div class="col-lg-8 col-xl-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('admin.member.store')}}" enctype="multipart/form-data">
                        @csrf
                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name')  is-invalid @enderror" id="name" placeholder="Surname Firstname, Other names" name="name" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username" placeholder="Enter username" name="username" value="{{ old('username') }}">
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
                                    <input type="tel" class="form-control  @error('phone')  is-invalid @enderror" id="phone" placeholder="Enter phone number" name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control  @error('email')  is-invalid @enderror" id="email" placeholder="Enter email address" name="email" value="{{ old('email') }}">
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
                                    <input type="text" class="form-control  @error('address')  is-invalid @enderror" name="address" id="address" placeholder="Enter address" value="{{ old('address') }}">
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
                                    <input type="text" class="form-control @error('parish')  is-invalid @enderror" id="parish" placeholder="Enter parish" name="parish" value="{{ old('parish') }}">
                                    @error('parish')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dioceses" class="form-label">Dioceses</label>
                                    <input type="text" class="form-control @error('dioceses')  is-invalid @enderror" id="dioceses" placeholder="Enter dioceses" name="dioceses" value="{{ old('dioceses') }}">
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="class" class="form-label">Class</label>
                                    <input type="text" class="form-control @error('class')  is-invalid @enderror"
                                           id="class" placeholder="Enter current class in school" name="class"
                                           value="{{ old('class')
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
                                           ('school') }}">
                                    @error('school')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div> <!-- end col -->
                        </div>
                           <div class="row">
                               <div class="col-md-4">
                                   <div class="mb-3">
                                       <div class="form-check">
                                       <input type="checkbox" class="form-check-input" name="inter_dioceses" id="inter_dioceses">
                                           <label for="inter_dioceses" class="form-check-label">Inter Dioceses</label>
                                           <br> <small class="text-info">Please check, if coming from a different dioceses</small>
                                       </div>
                                   </div>
                               </div>
                           </div>
                        <div class="row" id="parishSections">
                            <div class="col-md-6" >
                                <div class="mb-3">
                                    <label for="parish_of_residence" class="form-label">Parish of residence</label>
                                    <input type="text" class="form-control @error('parish_of_residence')  is-invalid @enderror" name="parish_of_residence" id="parish_of_residence" placeholder="Enter parish of residence" value="{{ old('parish_of_residence') }}">
                                    @error('parish_of_residence')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="home_parish" class="form-label">Home parish</label>
                                    <input type="text" class="form-control @error('home_parish')  is-invalid @enderror" id="home_parish" placeholder="Enter home parish" name="home_parish" value="{{ old('home_parish') }}">
                                    @error('home_parish')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password')  is-invalid @enderror" name="password" id="password" placeholder="Enter password" value="">
                                        @error('password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm password</label>
                                        <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm password" name="password_confirmation" value="">

                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Profile image</label>
                                    <input onchange="readURL(this);" type="file" class="form-control @error('photo')  is-invalid @enderror" id="photo" name="photo">
                                    @error('photo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 text-center">
                                    <label for="lastname" class="form-label">Current Image</label> <br>
                                    <img id="currentImage" width="300" height="300" class="img-responsive img-fluid w-50" src="{{ asset('no_image.jpg') }}" alt="">
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        <div class="row mt-3">
                            <div class="col-md-5 mx-auto">
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Change user access previleage  <span
                                            class="text-info">
                                            *(please
                                        ignore if not necessary)*</span></label>
                                    <select class="form-control @error('role')  is-invalid @enderror" id="role"
                                            name="role">
                                        <option value="" disabled selected>Select user access previleage</option>
                                        <option value="member">Member</option>
                                        <option value="admin">Admin</option>
                                    </select>

                                </div>
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
