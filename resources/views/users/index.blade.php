@extends('layouts.app')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Users</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List Users</h2>
                        <span class="pull-right">
                            <a class="btn btn-success" href="/user/create">Create</a>
                        </span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if(session()->get('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div><br/>
                        @endif
                            @if(session()->get('error'))
                                <div class="alert alert-error">
                                    {{ session()->get('error') }}
                                </div><br/>
                            @endif
                        <div id="myGrid" style="height: 600px;" class="ag-theme-balham"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#myGrid").jsGrid({
            width: "100%",
            inserting: false,
            editing: false,
            sorting: true,
            paging: true,

            data: JSON.parse(@json($users)),

            fields: [
                {title: "ID", name: "id", width:"20px"},
                {title: "Name", name: "name"},
                {title: "Phone", name: "phone"},
                {title: "Email", name: "email",width:"150px"},
                {title: "Birthday", name: "birthday"},
                {title: "Address", name: "address"},
                {
                    title: "Gender", name: "gender",width: "50px", itemTemplate: function (val, item) {
                        if(val == 1)  return $("<span>").text("Men");
                        if(val == 0)  return $("<span>").text("Women");
                    }
                },
                {
                    width:"100px", align:"center",itemTemplate: function (value, item) {
                        var $result = $([]);
                        $result = $result.add($("<a>").addClass("btn btn-xs btn-info").attr("href", "/user/" + item.id).text("View"));
                        $result = $result.add($("<a>").addClass("btn btn-xs btn-danger").attr("href", "/user/delete/" + item.id).text("Delete"));
                        return $result;
                    }
                },
            ]
        });
    </script>
@endsection