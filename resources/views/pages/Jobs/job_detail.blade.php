@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('main_trans.Main_title') }} | {{trans('jobs_trans.jobs_information')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('jobs_trans.jobs_information')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="tab nav-border">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                       <a class="nav-link active show" href="{{route('applications.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('jobs_trans.Apply')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <th scope="row">{{trans('jobs_trans.title')}}</th>
                                            <td>{{ $job->title }}</td>
                                            <th scope="row">{{trans('jobs_trans.description')}}</th>
                                            <td>{{$job->description}}</td>
                                            <th scope="row">{{trans('jobs_trans.location')}}</th>
                                            <td>{{$job->location}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{trans('jobs_trans.salary_range')}}</th>
                                            <td>{{ $job->salary_range }}</td>
                                            <th scope="row">{{trans('jobs_trans.employment_type')}}</th>
                                            <td>{{$job->employment_type}}</td>
                                            <th scope="row">{{trans('jobs_trans.status')}}</th>
                                            <td>{{$job->status}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
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
