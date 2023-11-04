@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('Users_trans.edit_User')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('Users_trans.edit_User')}}
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

                    <form action="{{route('Users.update', $User->id)}}" method="POST" autocomplete="off">
                        @method('PUT')
                        @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Users_trans.personal_information')}}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Users_trans.Name')}} : <span class="text-danger">*</span></label>
                                    <input value="{{$User->name}}" type="text" name="name"  class="form-control">
                                    <input type="hidden" name="id" value="{{$User->id}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Users_trans.Email')}} : </label>
                                    <input type="email" value="{{ $User->email }}" name="email" class="form-control" >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Users_trans.password')}} :</label>
                                    <input value="{{ $User->password }}" type="password" name="password" class="form-control" >
                                </div>
                            </div>
                        </div>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Users_trans.submit')}}</button>
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
