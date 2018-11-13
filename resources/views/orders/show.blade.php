@extends('layouts.app')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <a href="/orders" class="btn btn-success">Back</a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>order # {{$order->id}}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" src="{{ asset('images/picture.jpg') }}"
                                         alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                            <h3>Details</h3>
                            <ul class="list-unstyled user_data">
                                <li>
                                    Category: @switch($order->service_type)
                                        @case(1)
                                        <i class="fa fa-map-marker user-profile-icon"></i> FRIDGE
                                        @break
                                        @case(2)
                                        <i class="fa fa-map-marker user-profile-icon"></i> CAMERA
                                        @break
                                        @case(3)
                                        <i class="fa fa-map-marker user-profile-icon"></i> LIGHT
                                        @break
                                    @endswitch
                                </li>
                                <li>
                                    Address: <i class="fa fa-briefcase user-profile-icon"></i> {{$order->address}}
                                </li>
                                <li>
                                    Created At: <i class="fa fa-briefcase user-profile-icon"></i> {{$order->created_at}}
                                </li>
                                <li>
                                    Charge Amount: <i class="fa fa-briefcase user-profile-icon"></i> {{$order->charge_amount}}
                                </li>
                                <li>
                                    Deduced Point: <i class="fa fa-briefcase user-profile-icon"></i> {{$order->partner_deduce_point}}
                                </li>
                                <li>
                                    Rating: <i class="fa fa-briefcase user-profile-icon"></i> {{$order->client_rating}}
                                </li>
                                <li>
                                    Status: <i class="fa fa-briefcase user-profile-icon"></i> {{$order->status}}
                                </li>
                            </ul>
                            <br/>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="profile_title">
                                <div class="col-md-12">
                                    <h2>Details of client / partner</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Client</h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <ul>
                                                <li>Name: {{$order->client->display_name}}</li>
                                                <li>Phone Number: {{$order->client->phone_number}}</li>
                                                <li>Reward point: {{$order->client->reward_points}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Partner</h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <ul>
                                                <li>Name: {{$order->partner->email}}</li>
                                                <li>Phone Number: {{$order->partner->phone_number}}</li>
                                                <li>Partner deduced point: {{$order->partner_deduce_point}}</li>
                                                <li>Balance: {{$order->partner->balance}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection