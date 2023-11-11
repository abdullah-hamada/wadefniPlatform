@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('Applications_trans.apply_for_Job')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('Applications_trans.apply_for_Job')}}
@stop



<!-- breadcrumb -->
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Jobs_trans.jobs_information')}}</h6><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('Jobs_trans.title')}}</label>
                                <input value="{{$Job->title}}"  disabled type="text" name="title"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('Jobs_trans.location')}}</label>
                                <input value="{{$Job->location}}" disabled type="text" name="location"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('Jobs_trans.salary_range')}}</label>
                                <input value="{{$Job->salary_range}}" disabled type="text" name="salary_range"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('Jobs_trans.employment_type')}}</label>
                                <input value="{{$Job->employment_type}}" disabled type="text" name="employment_type"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('Jobs_trans.posted_at')}}</label>
                                <input value="{{ \Carbon\Carbon::parse($Job->posted_at)->diffForHumans() }}" style="color: blue" type="text" name="posted_at" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('Jobs_trans.expires_at')}}</label>
                                <input value="{{$Job->expires_at}}"  style="color: red" type="text" name="expires_at"  class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post"  action="{{ route('Applications.store') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Applications_trans.Applications_information')}}</h6><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" name="job_id" value="{{$Job->id}}">
                                        <input type="hidden" name="employer_id" value="{{$Job->employer_id}}">
                                        <label>{{trans('Applications_trans.cover_letter')}} : <span class="text-danger">*</span></label>
                                        <textarea name="cover_letter" class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{trans('Applications_trans.attachements')}} : <span class="text-danger">*</span></label>
                                        <br><br>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </div>
                            </div>
                            <br>
                        <button class="btn btn-success btn-block nextBtn btn-lg pull-right" type="submit">{{trans('Applications_trans.submit')}}</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection
