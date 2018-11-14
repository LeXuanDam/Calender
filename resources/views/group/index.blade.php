@extends('layouts.app')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Group</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List Group</h2>
                        <span class="pull-right">
                            <a class="btn btn-success" href="/group/create">Create</a>
                        </span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
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

            data: JSON.parse(@json($group)),

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
            ]
        });
    </script>
@endsection