@extends('layouts.app')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <a href="/company" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>order # {{$company->id}}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-8 col-sm-offset-2 col-sm-8 col-md-offset-2 col-xs-12 profile_left">
                            <form action="/company/{{$company->id}}" method="post">
                                @method('PATCH')
                                @csrf
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="company_name">Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" name="company_name" required="required" value="{{$company->company_name}}" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="phone">Người đại diện <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" name="director" required="required" value="{{$company->user->name}}" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="phone">Phone <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" name="phone" value="{{$company->phone}}" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Email
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" name="email" value="{{$company->email}}" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="address">Address
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" name="address" value="{{$company->address}}" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div style="text-align: center">
                                    <input type="submit" value="Save" class="btn btn-success">
                                </div>
                                <br/>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection