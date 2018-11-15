@extends('layouts.app')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <a href="/group" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>order # {{$group->id}}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-8 col-sm-offset-2 col-sm-8 col-md-offset-2 col-xs-12 profile_left">
                            <form action="group/{{$group->id}}" method="post">
                                @method('PATCH')
                                @csrf
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" name="group_name" required="required" value="{{$group->group_name}}" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                </br>
                                <button class="btn btn-success">Thêm thành viên</button>

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