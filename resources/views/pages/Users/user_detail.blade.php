@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('Users_trans.User_details')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('Users_trans.User_details')}}
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
                                    <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                       role="tab" aria-controls="home-02"
                                       aria-selected="true">{{trans('Users_trans.User_details')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <th scope="row">{{trans('Users_trans.Name')}}</th>
                                            <td>{{ $User->name }}</td>
                                            <th scope="row">{{trans('Users_trans.Email')}}</th>
                                            <td>{{$User->email}}</td>
                                            <th scope="row">{{trans('Users_trans.User_type')}}</th>
                                            <td>{{$User->user_type}}</td>
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
