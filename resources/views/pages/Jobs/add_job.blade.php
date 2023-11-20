@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('main_trans.Main_title') }} | {{trans('Jobs_trans.add_Job')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('Jobs_trans.add_Job')}}
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

                <form method="post"  action="{{ route('jobs.store') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Jobs_trans.jobs_information')}}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Jobs_trans.title')}} : <span class="text-danger">*</span></label>
                                    <input  type="text" name="title"  class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Jobs_trans.description')}} : </label>
                                    <input type="text"  name="description" class="form-control" >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Jobs_trans.location')}} : </label>
                                    <input type="text"  name="location" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Jobs_trans.salary_range')}} : <span class="text-danger">*</span></label>
                                    <input  type="text" name="salary_range"  class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Jobs_trans.employment_type')}} : <span class="text-danger">*</span></label>
                                    <select name="employment_type" class="custom-select">
                                        <option value="#" selected disabled>الرجاء الاختيار</option>
                                        <option value="full-time">Full-time</option>
                                        <option value="part-time">Part-time</option>
                                        <option value="Contract">Contract</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Jobs_trans.status')}} : <span class="text-danger">*</span></label>
                                    <select name="status" class="custom-select">
                                        <option value="#" selected disabled>الرجاء الاختيار</option>
                                        <option value="open">Open</option>
                                        <option value="closed">Closed</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Jobs_trans.submit')}}</button>
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
