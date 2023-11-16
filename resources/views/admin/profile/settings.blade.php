@extends('admin.layouts.admin')

@section('title', 'Settings')
@section('css')

@endsection
@section('admin')
    <div class="row">
        <div class="col-lg-8 col-xl-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('admin.setting.update')}}">
                        @csrf
                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Change Password</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password')  is-invalid @enderror" id="name" placeholder="Enter password" name="password" value="{{ old('password') }}">
                                    @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">New password</label>
                                    <input type="password" class="form-control @error('new_password')  is-invalid @enderror" id="new_password" placeholder="Enter new password" name="new_password" value="{{ old('new_password') }}">
                                    @error('new_password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="new_password_confirmation" class="form-label">Confirm password</label>
                                    <input type="password" class="form-control" id="new_password_confirmation" placeholder="Confirm password" name="new_password_confirmation">

                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->


                        <div class="text-end">
                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div> <!-- end card-->

    </div>
    <!-- end row -->



@endsection
@section('js')


@endsection
