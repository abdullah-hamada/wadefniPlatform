@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('main_trans.Main_title') }} | {{trans('jobs_trans.edit_job')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('jobs_trans.edit_job')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
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

                    <form action="{{route('jobs.update', $job->id)}}" method="POST" autocomplete="off">
                        @method('PUT')
                        @csrf
                     <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('jobs_trans.jobs_information')}}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('jobs_trans.title')}} : <span class="text-danger">*</span></label>
                                    <input value="{{$job->title}}" type="text" name="title"  class="form-control">
                                    <input type="hidden" name="id" value="{{$job->id}}">
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('jobs_trans.description')}} : </label>
                                    <input value="{{$job->description}}" type="text"  name="description" class="form-control" >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('jobs_trans.location')}} : </label>
                                    <input value="{{$job->location}}" type="text"  name="location" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('jobs_trans.salary_range')}} : <span class="text-danger">*</span></label>
                                    <input value="{{$job->salary_range}}" type="text" name="salary_range"  class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('jobs_trans.employment_type')}} : <span class="text-danger">*</span></label>
                                    <select value="{{$job->employment_type}}" name="employment_type" class="custom-select">
                                        <option value="#" selected disabled>الرجاء الاختيار</option>
                                        <option value="full-time" {{ $job->employment_type == 'full-time' ? 'selected' : '' }}>Full-time</option>
                                        <option value="part-time" {{ $job->employment_type == 'part-time' ? 'selected' : '' }}>Part-time</option>
                                        <option value="contract" {{ $job->employment_type == 'contract' ? 'selected' : '' }}>Contract</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('jobs_trans.status')}} : <span class="text-danger">*</span></label>
                                    <select value="{{$job->status}}" name="status" class="custom-select">
                                        <option value="#" selected disabled>الرجاء الاختيار</option>
                                        <option value="open" {{ $job->status == 'open' ? 'selected' : '' }}>Open</option>
                                        <option value="closed" {{ $job->status == 'closed' ? 'selected' : '' }}>Closed</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('jobs_trans.submit')}}</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
