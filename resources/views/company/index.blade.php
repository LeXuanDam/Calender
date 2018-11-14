@extends('layouts.app')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Company</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> List Company</h2>
                        <span class="pull-right">
                            <a class="btn btn-success" href="/company/create">Create</a>
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

            data: JSON.parse(@json($company)),

            fields: [
                {title: "Name", name: "name"},
                {title: "Đại diện", name: "director"},
                {title: "Phone", name: "phone"},
                {title: "Email", name: "email",width:"150px"},
                {
                    width:"100px", align:"center",itemTemplate: function (value, item) {
                        var $result = $([]);
                        $result = $result.add($("<a>").addClass("btn btn-xs btn-info").attr("href", "/company/" + item.id).text("View"));
                        $result = $result.add($("<a>").addClass("btn btn-xs btn-danger").attr("href", "/company/delete/" + item.id).text("Delete"));
                        return $result;
                    }
                },
            ]
        });
    </script>
@endsection