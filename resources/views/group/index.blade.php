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
                        @if(session()->get('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
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
            data: JSON.parse(@json($group)),

            fields: [
                {title: "Name", name: "group_name"},
                {
                    title:"Người tạo",itemTemplate: function (value, item) {
                        return item.user.name;
                    }
                },
                {title: "Tổng số người", name: "total",width:"150px"},
                {
                    width:"100px", align:"center",itemTemplate: function (value, item) {
                        var $result = $([]);
                        $result = $result.add($("<a>").addClass("btn btn-xs btn-info").attr("href", "/group/" + item.id).text("View"));
                        $result = $result.add($("<a>").addClass("btn btn-xs btn-danger").attr("href", "/group/delete/" + item.id).text("Delete"));
                        return $result;
                    }
                },
            ]
        });
    </script>
@endsection