@extends('layouts.app')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Orders</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Orders</h2>
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
            editing: true,
            sorting: true,
            paging: true,

            data: JSON.parse(@json($orders)),

            fields: [
                {title: "ID", name: "id", width: 50},
                {
                    title: "Client", name: "client.phone_number", width: 150,
                    itemTemplate: function (val, item) {
                        return $("<a>").attr("href", "/clients/" + item.client_id).text(val);
                    }
                },
                {
                    title: "Partner", name: "partner.phone_number", width: 150,
                    itemTemplate: function (val, item) {
                        return $("<a>").attr("href", "/partner/" + item.partner_id).text(val);
                    }
                },
                {title: "Amount", name: "charge_amount", width: 80},
                {
                    title: "Category", name: "service_type", width: 100,
                    itemTemplate: function (val, item) {
                        if (val == 1) {
                            return $("<span>").text("Fridge");
                        } else if (val == 2) {
                            return $("<span>").text("Camera");
                        } else if (val == 3) {
                            return $("<span>").text("Light");
                        }
                    },
                },
                {
                    title: "Status", name: "status", itemTemplate: function (val, item) {
                        var html = '';
                        switch (val) {
                            case -3:
                                html = $("<span>").text("DELETE BY ADMIN");
                                break;
                            case -2:
                                html = $("<span>").text("REJECT");
                                break;
                            case -1:
                                html = $("<span>").text("CANCEL");
                                break;
                            case 0:
                                html = $("<span>").text("WAITING");
                                break;
                            case 1:
                                html = $("<span>").text("ACCEPT");
                                break;
                            case 2:
                                html = $("<span>").text("DONE");
                                break;
                            case 3:
                                html = $("<span>").text("RATED");
                                break;
                            default:
                                html = $("<span>").text("!ERR#");
                                break;
                        }
                        return html;
                    }
                },
                {title: "Created At", name: "created_at"},
                {
                    width: 150, itemTemplate: function (value, item) {
                        var html = '';
                        var forbidArr = [-3, -2, -1, 2, 3];
                        html = "<a class='btn btn-xs btn-info' href='/orders/" + item.id + "'>View</a>";
                        if (!forbidArr.includes(item.status)) {
                            html += '<form action="/orders/' + item.id + '" method="POST">';
                            html += '@method('DELETE')';
                            html += '@csrf';
                            html += '<button class="btn btn-xs btn-danger">Reverse</button></form>';
                        }
                        return html;
                    }
                },
            ]
        });
    </script>
@endsection