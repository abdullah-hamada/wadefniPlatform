@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('main_trans.Main_title') }} | {{ trans('jobs_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('main_trans.avaliable_jobs') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">


@if ($errors->any())
    <div class="error">{{ $errors->first('Name') }}</div>
@endif



<div class="col-xl-12 mb-30">
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
            <br><br>
            <div class="container">
                <div class="row">
                    @if ($jobs->count() == 0)
                    <h5>{{ trans('jobs_trans.no_jobs') }}</h5>
                    @endif
                    @foreach($jobs as $job)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body" style="height:  250px;">
                                <h5 class="card-title" style="text-align: center;">{{ Str::words($job->title, 3, '...') }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted" style=" text-align: center; ">{{ $job->employment_type }}</h6>
                                <p class="card-text" style="text-align: center;"><small>{{ trans('jobs_trans.salary_range') }} : {{ $job->salary_range }}</small></p>
                                <p class="card-text">{{ Str::words($job->description, 40, '...') }}</p>
                            </div>
                            <p class="card-text" style=" color: red; text-align: center; ">{{ trans('jobs_trans.expires_at') }} : {{ $job->expires_at }}</p>
                            <br> <br>
                            <a href="{{route('applications.create',$job->id)}}" class="btn btn-success btn-block mb-3">{{ trans('jobs_trans.Apply') }}</a>
                            <br>
                            <br>
                        </div>
                    </div>
                    @endforeach
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
