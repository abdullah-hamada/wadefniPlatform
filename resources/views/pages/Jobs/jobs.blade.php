@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Jobs_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('main_trans.Jobs') }}
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
            
            <a href="{{route('Jobs.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('Jobs_trans.add_Job')}}</a>
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('Jobs_trans.title') }}</th>
                            <th>{{ trans('Jobs_trans.location') }}</th>
                            <th>{{ trans('Jobs_trans.employment_type') }}</th>
                            <th>{{ trans('Jobs_trans.salary_range') }}</th>
                            <th>{{ trans('Jobs_trans.status') }}</th>
                            <th>{{ trans('Jobs_trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Jobs as $Job) 
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $Job->title }}</td>
                                <td>{{ $Job->location }}</td>
                                <td>{{ $Job->employment_type }}</td>
                                <td>{{ $Job->salary_range }}</td>
                                @if ($Job->status == 'open')
                                <td>{{ $Job->status }} &nbsp;<i style="color:green" class="far fa-check-circle" aria-hidden="true"></i></td>
                                @else
                                <td>{{ $Job->status }} &nbsp;<i style="color: red" class="far fa-stop-circle" aria-hidden="true"></i></td>
                                @endif
                                <td>
                                    <div class="dropdown show">
                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            العمليات
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{route('Jobs.show',$Job->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp; {{ trans('Jobs_trans.Show') }}</a>
                                            <a class="dropdown-item" href="{{route('Jobs.edit',$Job->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp; {{ trans('Jobs_trans.Edit') }}</a>
                                            <a class="dropdown-item" data-target="#delete{{ $Job->id }}" data-toggle="modal"><i style="color: red" class="fa fa-trash"></i>&nbsp;  {{ trans('Jobs_trans.Delete') }}</a>
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
