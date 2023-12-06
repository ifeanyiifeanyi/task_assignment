@extends('member.layouts.members')

@section('title', "Edit Apostolic Work History" )
@section('css')

@endsection

@section('members')

    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
        <div class="blog-details-content">
            <div class="news-block-one">
                <div class="inner-box">

                    <div class="lower-content">
                        <h3>Activity Logs</h3>
                        <hr>
                        <div class="blog-details-content">
                            <div class="news-block-one">
                                <!-- resources/views/apostolic_works_form.blade.php -->

                                <form action="{{route('apostolic.history.update', $history)}}" method="post"
                                      id="apostolicForm">
                                    @csrf
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="start_date">Start Date</label>
                                                    <input type="date" class="form-control" name="start_date"
                                                           value="{{old('start', $history->start_date->format('Y-m-d'))
                                                           }}" >
                                                    @error('start_date')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="end_date">End Date</label>
                                                    <input type="date" class="form-control" name="end_date"
                                                           value="{{old('end_date', $history->end_date->format('Y-m-d'))}}">
                                                    @error('end_date')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="duration_in_words">Duration in Words</label>
                                                    <input type="text" class="form-control" required
                                                           name="duration_in_words" value="{{old('duration_in_words', $history->duration_in_words)}}">
                                                    @error('duration_in_words')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="organization">Organization</label>
                                                    <input type="text" class="form-control" name="organization" value="{{old('organization', $history->organization)}}">
                                                    @error('organization')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary">Update Apostolic Works</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>






    </div>
@endsection





@section('js')

@endsection
