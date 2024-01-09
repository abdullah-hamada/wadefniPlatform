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
{{ trans('main_trans.jobs') }}
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
            @can('create jobs')
            <a href="{{route('jobs.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('jobs_trans.add_job')}}</a>
            <br><br>
            @endcan
            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('jobs_trans.title') }}</th>
                            <th>{{ trans('jobs_trans.location') }}</th>
                            <th>{{ trans('jobs_trans.employment_type') }}</th>
                            <th>{{ trans('jobs_trans.salary_range') }}</th>
                            <th>{{ trans('jobs_trans.status') }}</th>
                            <th>{{ trans('jobs_trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($jobs as $job) 
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->location }}</td>
                                <td>{{ $job->employment_type }}</td>
                                <td>{{ $job->salary_range }}</td>
                                @if ($job->status == 'open')
                                <td>{{ $job->status }} &nbsp;<i style="color:green" class="far fa-check-circle" aria-hidden="true"></i></td>
                                @else
                                <td>{{ $job->status }} &nbsp;<i style="color: red" class="far fa-stop-circle" aria-hidden="true"></i></td>
                                @endif
                                <td>
                                    <div class="dropdown show">
                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            العمليات
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{route('jobs.show',$job->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp; {{ trans('jobs_trans.Show') }}</a>
                                            <a class="dropdown-item" href="{{route('jobs.edit',$job->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp; {{ trans('jobs_trans.Edit') }}</a>
                                            <a class="dropdown-item" data-target="#delete{{ $job->id }}" data-toggle="modal"><i style="color: red" class="fa fa-trash"></i>&nbsp;  {{ trans('jobs_trans.Delete') }}</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @include('pages.Jobs.delete_job')
                        @endforeach
                </table>
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
