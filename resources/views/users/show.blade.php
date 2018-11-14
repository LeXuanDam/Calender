@extends('layouts.app')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <a href="/user" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>User # {{$user->id}}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-8 col-sm-offset-2 col-sm-8 col-md-offset-2 col-xs-12 profile_left">
                        <form action="#" method="post">
                            <div class="form-group row">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" name="name" required="required" value="{{$user->name}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="phone">Phone <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" name="phone" required="required" value="{{$user->phone}}" readonly class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" name="email" value="{{$user->email}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="address">Address <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" name="address" value="{{$user->address}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="birthday">Birthday <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" name="birthday" value="{{$user->birthday}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="avatar">Avatar <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="file" name="avatar" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="password">Password <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="password" name="password" value="{{$user->password}}" required="required" class="form-control col-md-7 col-xs-12">
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