@extends('layouts.app')

@section('content')
<div class="">
  <div class="page-title">
    <div class="title_left">
      <a href="/user" class="btn btn-success">Back</a>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Create new client</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif
        <form method="post" action="/user" class="form-horizontal form-label-left">
        {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone_number">Phone <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="phone" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="form-group">
                <label for="display_name" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="password" class="form-control col-md-7 col-xs-12" type="text">
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
