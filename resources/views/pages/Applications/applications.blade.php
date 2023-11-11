@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Applications_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('main_trans.Applications') }}
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

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('Jobs_trans.title') }}</th>
                            <th>{{ trans('Applications_trans.name') }}</th>
                            <th>{{ trans('Applications_trans.company_name') }}</th>
                            <th>{{ trans('Applications_trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Applications as $Application) 
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $Application->job->title }}</td>
                                <td>{{ $Application->applicant->name }}</td>
                                <td>{{ $Application->job->employer->name }}</td>
                                <td>
                                    <a class="dropdown-item" href="{{route('Applications.show',$Application->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp; {{ trans('Applications_trans.Show') }}</a>
                                </td>
                            </tr>
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
