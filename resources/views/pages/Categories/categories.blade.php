@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('categories_trans.title_page') }}
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

            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('categories_trans.add_category') }}
            </button>
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('categories_trans.name') }}</th>
                            <th>{{ trans('categories_trans.code') }}</th>
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
                                @if ($category->status == 'active')
                                <td>{{ $category->status }} &nbsp;<i style="color:green" class="far fa-check-circle" aria-hidden="true"></i></td>
                                @else
                                <td>{{ $category->status }} &nbsp;<i style="color: red" class="far fa-stop-circle" aria-hidden="true"></i></td>
                                @endif
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $category->id }}"
                                        title="{{ trans('categories_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $category->id }}"
                                        title="{{ trans('categories_trans.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_category -->
                            <div class="modal fade" id="edit{{ $category->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('categories_trans.edit_category') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('categories.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="name"
                                                            class="mr-sm-2">{{ trans('categories_trans.name') }}
                                                            :</label>
                                                        <input id="name" type="text" name="name"
                                                            class="form-control"
                                                            value="{{ $category->name }}"
                                                            required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $category->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="code"
                                                            class="mr-sm-2">{{ trans('categories_trans.code') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $category->code }}"
                                                            name="code" required>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col">
                                                    <label>{{trans('categories_trans.status')}} : <span class="text-danger">*</span></label>
                                                    <select name="status" value="{{ $category->status }}" class="custom-select">
                                                        <option value="#" disabled>الرجاء الاختيار</option>
                                                        <option value="active">{{ trans('categories_trans.active') }}</option>
                                                        <option value="inactive">{{ trans('categories_trans.inactive') }}</option>
                                                    </select>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">{{ trans('categories_trans.description') }}
                                                        :</label>
                                                    <textarea class="form-control" name="description"
                                                        id="exampleFormControlTextarea1"
                                                        rows="3">{{ $category->description }}</textarea>
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('categories_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-success">{{ trans('categories_trans.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_category -->
                            <div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('categories_trans.delete_category') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('categories.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('categories_trans.Warning_category') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $category->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('categories_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ trans('categories_trans.submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


<!-- add_modal_category -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('categories_trans.add_category') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="name" class="mr-sm-2">{{ trans('categories_trans.name') }}
                                :</label>
                            <input id="name" type="text" name="name" class="form-control">
                        </div>
                        <div class="col">
                            <label for="code" class="mr-sm-2">{{ trans('categories_trans.code') }}
                                :</label>
                            <input type="text" class="form-control" name="code">
                        </div>
                    </div>
                    <br>
                    <div class="col">
                        <label>{{trans('categories_trans.status')}} : <span class="text-danger">*</span></label>
                        <select name="status" class="custom-select">
                            <option value="#" selected disabled>{{ trans('categories_trans.please_select') }}</option>
                            <option value="active">{{ trans('categories_trans.active') }}</option>
                            <option value="inactive">{{ trans('categories_trans.inactive') }}</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('categories_trans.description') }}
                            :</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('categories_trans.Close') }}</button>
                <button type="submit" class="btn btn-success">{{ trans('categories_trans.submit') }}</button>
            </div>
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
