@extends('member.layouts.members')

@section('title', "Update Profile" )
@section('css')

@endsection

@section('members')

    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
        <div class="blog-details-content">
            <div class="news-block-one">
                <div class="inner-box p-3">
                    <h4>Update Profile Details ... </h4>
                    <hr>
                    <form action="{{route('member.update.updateProfile', $user)}}" method="post" class="default-form"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class=" @error('name')  border-danger
                                   @enderror" value="{{old('name', $user->name)}}">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class=" @error('username')  border-danger
                                   @enderror" value="{{old('username', $user->username)}}">
                                    @error('username')
                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" class=" @error('email')  border-danger
                                   @enderror" value="{{old('email', $user->email)}}">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="tel" name="phone" class=" @error('phone')  border-danger
                                   @enderror" value="{{old('phone', $user->phone)}}">
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" class=" @error('address')  border-danger
                               @enderror" value="{{old('address', $user->address)}}">
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Class</label>
                                    <input type="text" name="class" class=" @error('class')  border-danger
                                   @enderror" value="{{old('class', $user->class)}}">
                                    @error('class')
                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>School</label>
                                    <input type="text" name="school" class=" @error('school')  border-danger
                                   @enderror" value="{{old('school', $user->school)}}">
                                    @error('school')
                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>
                            </div>
                        </div>
                        @if($user->inter_dioceses === 0)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Home Parish</label>
                                        <input type="text" name="home_parish" class=" @error('home_parish')  border-danger
                                   @enderror" value="{{old('home_parish', $user->home_parish)}}">
                                        @error('home_parish')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Residential Parish</label>
                                        <input type="text" name="parish_of_residence" class=" @error('parish_of_residence')  border-danger
                                   @enderror" value="{{old('parish_of_residence', $user->parish_of_residence)}}">
                                        @error('parish_of_residence')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Dioceses</label>
                                    <input type="text" name="dioceses" class=" @error('dioceses')  border-danger
                                   @enderror" value="{{old('dioceses', $user->dioceses)}}">
                                    @error('dioceses')
                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Parish</label>
                                    <input type="text" name="parish" class=" @error('parish')  border-danger
                                   @enderror" value="{{old('parish', $user->parish)}}">
                                    @error('parish')
                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>
                            </div>
                        </div>  <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Profile Photo</label>
                                    <input onchange="readURL(this);" type="file" name="photo" class=" @error('photo')  border-danger
                                   @enderror">
                                    @error('photo')
                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="form-group">

                                    <label>Current Profile Photo</label> <br>
                                    <img id="currentImage" src="{{$user->photo ? asset($user->photo) : asset('no_image.jpg')}}" alt=""
                                         class="img-fluid
                                    img-responsive w-50
                                    shadow">
                                </div>
                            </div>
                        </div>

                        <div class="form-group message-btn">
                            <button type="submit" class="theme-btn btn-one w-100">Update Profile</button>
                        </div>
                    </form>
                </div>

            </div>


        </div>






    </div>
@endsection





@section('js')
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
