@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('main_trans.Main_title') }} | {{ trans('Jobs_trans.title_page') }}
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
                    @foreach($Jobs as $Job)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body" style="height:  250px;">
                                <h5 class="card-title" style="text-align: center;">{{ $Job->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted" style=" text-align: center; ">{{ $Job->employment_type }}</h6>
                                <p class="card-text" style="text-align: center;"><small>{{ trans('Jobs_trans.salary_range') }} : {{ $Job->salary_range }}</small></p>
                                <p class="card-text">{{ Str::words($Job->description, 40, '...') }}</p>
                            </div>
                            <p class="card-text" style=" color: red; text-align: center; ">{{ trans('Jobs_trans.expires_at') }} : {{ $Job->expires_at }}</p>
                            <br> <br>
                            <a href="{{route('Applications.create',$Job->id)}}" class="btn btn-success btn-block mb-3">{{ trans('Jobs_trans.Apply') }}</a>
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
