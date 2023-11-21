@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('main_trans.Main_title') }} | {{ trans('categories_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('main_trans.Categories') }}
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
            
            <a href="{{route('categories.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('categories_trans.add_category')}}</a>
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('categories_trans.name') }}</th>
                            <th>{{ trans('categories_trans.code') }}</th>
                            <th>{{ trans('categories_trans.description') }}</th>
                            <th>{{ trans('categories_trans.status') }}</th>
                            <th>{{ trans('categories_trans.processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($categories as $category) 
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->code }}</td>
                                <td>{{ $category->description }}</td>
                                <td>{{ $category->status }}</td>
                                <td>
                                    <div class="dropdown show">
                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            العمليات
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{route('categories.show',$category->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp; {{ trans('categories_trans.Show') }}</a>
                                            <a class="dropdown-item" href="{{route('categories.edit',$category->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp; {{ trans('categories_trans.Edit') }}</a>
                                            <a class="dropdown-item" data-target="#delete{{ $category->id }}" data-toggle="modal"><i style="color: red" class="fa fa-trash"></i>&nbsp;  {{ trans('categories_trans.Delete') }}</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @include('pages.categories.delete_category')
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
