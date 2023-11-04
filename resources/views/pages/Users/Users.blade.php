@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Users_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('main_trans.Users') }}
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
            
            <a href="{{route('Users.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('Users_trans.add_User')}}</a>
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('Users_trans.Name') }}</th>
                            <th>{{ trans('Users_trans.Email') }}</th>
                            <th>{{ trans('Users_trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Users as $User) 
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $User->name }}</td>
                                <td>{{ $User->email }}</td>
                                {{-- <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $User->id }}"
                                        title="{{ trans('Users_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $User->id }}"
                                        title="{{ trans('Users_trans.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td> --}}
                                <td>
                                    <div class="dropdown show">
                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            العمليات
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{route('Users.show',$User->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp; {{ trans('Users_trans.Show') }}</a>
                                            <a class="dropdown-item" href="{{route('Users.edit',$User->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp; {{ trans('Users_trans.Edit') }}</a>
                                            <a class="dropdown-item" data-target="#delete{{ $User->id }}" data-toggle="modal"><i style="color: red" class="fa fa-trash"></i>&nbsp;  {{ trans('Users_trans.Delete') }}</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @include('pages.Users.delete_user')
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
