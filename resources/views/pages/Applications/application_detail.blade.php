@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('main_trans.Main_title') }} | {{trans('Applications_trans.Applications_information')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('Applications_trans.Applications_information')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Applications_trans.Applications_information')}}</h6><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('Applications_trans.name')}}</label>
                                <input value="{{$Application->applicant->name}}"  disabled type="text" name="title"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('Applications_trans.email')}}</label>
                                <input value="{{$Application->applicant->email}}" disabled type="text" name="email"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('Jobs_trans.title')}}</label>
                                <input value="{{$Application->job->title}}" disabled type="text" name="title"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('Jobs_trans.employment_type')}}</label>
                                <input value="{{$Application->job->employment_type}}" disabled type="text" name="employment_type"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('Jobs_trans.posted_at')}}</label>
                                <input value="{{ \Carbon\Carbon::parse($Application->job->posted_at)->diffForHumans() }}" style="color: blue" type="text" disabled name="posted_at" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('Jobs_trans.expires_at')}}</label>
                                <input value="{{$Application->job->expires_at}}"  style="color: red" type="text" name="expires_at" disabled class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>{{trans('Applications_trans.cover_letter')}}</label>
                                <input value="{{$Application->cover_letter}}"  style="color: blue" type="text" name="cover_letter" disabled class="form-control">
                            </div>
                        </div>
        
                    </div>
                </div>
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
