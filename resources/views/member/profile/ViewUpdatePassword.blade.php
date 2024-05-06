@extends('member.layouts.members')

@section('title', "Update Password" )
@section('css')

@endsection

@section('members')

    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
        <div class="blog-details-content">
            <div class="news-block-one">
                <div class="inner-box p-3">
                    <h4>Update Password</h4>
                     <hr>
                    <form action="{{route('member.password.update')}}" method="post" class="default-form">
                        @csrf
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password" name="password" class="@error('password')  is-invalid @enderror">
                            @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                       <div class="row">
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label>New Password</label>
                                   <input type="password" name="new_password"class="@error('new_password')  is-invalid
                                   @enderror">
                                   @error('new_password')
                                   <span class="invalid-feedback">{{ $message }}</span>
                                   @enderror
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label>Confirm Password</label>
                                   <input type="password" name="new_password_confirmation" class="@error('new_password')  is-invalid @enderror">
                               </div>
                           </div>
                       </div>


                        <div class="form-group message-btn">
                            <button type="submit" class="theme-btn btn-one">Update Password</button>
                        </div>
                    </form>
                </div>

            </div>


        </div>






    </div>
@endsection





@section('js')

@endsection
