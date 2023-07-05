@extends('frontend.master')
@section('contents')
    <style>
        tracking {
            color: #000;
            overflow-x: hidden;
            height: 100%;
            background-color: #8C9EFF;
            background-repeat: no-repeat;
        }

        .card {
            z-index: 0;
            background-color: #ECEFF1;
            padding-bottom: 20px;
            margin-top: 90px;
            margin-bottom: 90px;
            border-radius: 10px;
        }

        .top {
            padding-top: 40px;
            padding-left: 13% !important;
            padding-right: 13% !important;
        }

        /*Icon progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: #455A64;
            padding-left: 0px;
            margin-top: 30px;
        }

        #progressbar li {
            list-style-type: none;
            font-size: 13px;
            width: 25%;
            float: left;
            position: relative;
            font-weight: 400;
        }

        #progressbar .step0:before {
            font-family: FontAwesome;
            content: "\f10c";
            color: #fff;
        }

        #progressbar li:before {
            width: 40px;
            height: 40px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            background: #C5CAE9;
            border-radius: 50%;
            margin: auto;
            padding: 0px;
        }

        /*ProgressBar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 12px;
            background: #C5CAE9;
            position: absolute;
            left: 0;
            top: 16px;
            z-index: -1;
        }

        #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            position: absolute;
            left: -50%;
        }

        #progressbar li:nth-child(2):after,
        #progressbar li:nth-child(3):after {
            left: -50%;
        }

        #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            position: absolute;
            left: 50%;
        }

        #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        /*Color number of the step and the connector before it*/
        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #651FFF;
        }

        #progressbar li.active:before {
            font-family: FontAwesome;
            content: "\f00c";
        }

        .icon {
            width: 60px;
            height: 60px;
            margin-right: 15px;
        }

        .icon-content {
            padding-bottom: 20px;
        }

        @media screen and (max-width: 992px) {
            .icon-content {
                width: 50%;
            }
        }
    </style>

    <section class="section profile" style="margin-top: -78px;">
        <div class="row">

            <div class="col-xl-4" style="color: #7FAD39;">

                <div class="card" style="color: green;">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img width="200" src="{{ url('uploads/frontUser', auth('customer')->user()->image) }}"
                            alt="Profile" class="rounded-circle">
                        <h3>{{ auth('customer')->user()->name }}</h3>
                        <h4>Web Developer</h4>
                        <div class="social-links mt-2">
                            <!-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="3" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> -->
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->

                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>

                            <!-- <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                            </li> -->

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-recent-list">Recent Order</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-order-list">
                                    Orders </button>
                            </li>

                        </ul>

                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Name</div>
                                    <div class="col-lg-9 col-md-8">{{ auth('customer')->user()->name }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ auth('customer')->user()->email }}</div>
                                </div>






                            </div>


                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{ route('frontuser.profile.update', auth('customer')->user()->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                            Image</label>
                                        <input type="file" class="bi bi-upload" name="image">
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name"
                                                value="{{ auth('customer')->user()->name }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email"
                                                value="{{ auth('customer')->user()->email }}">
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success my-2">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>


                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="{{ route('front.pass.update', auth('customer')->user()->id) }}"
                                    method="POST">
                                    @csrf


                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control" id="newPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>


                            <!-- Recent Order -->

                            <div class="tracking tab-pane fade pt-3" id="profile-change-recent-list">


                                <div class="container px-1 px-md-4 py-5" style="margin-top: -80px;">

                                    <div style="margin-top: 30px;">
                                        <table class="table">

                                            <thead class="table-dark">
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Order Date</th>
                                                    <th scope="col">Order Amount</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Order Details</th>
                                                    <th scope="col">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($Orders as $key => $Order)
                                                    <tr>

                                                        <th scope="row">{{ $key + 1 }}</th>
                                                        <td>{{ $Order->created_at }}</td>
                                                        <td>{{ $Order->amount }} BDT</td>
                                                        <td>
                                                            {{ $Order->status }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('front.order.receipt', $Order->id) }}"
                                                                class="btn btn-warning">Order Reciept</a>
                                                        </td>


                                                        <td>
                                                            <a href="{{ route('frontuser.order.track', $Order->id) }}"
                                                                class="btn btn-success my-2">Tracking Status</a>
                                                            @if ($Order->status != 'cancel')
                                                                <a href="{{ route('cancel.order', $Order->id) }}"
                                                                    class="btn btn-danger">Cancel</a>
                                                            @endif
                                                        </td>


                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>


                            <!-- Tracking -->

                            <div class="tracking tab-pane fade pt-3" id="profile-change-order-list">


                                <div class="container px-1 px-md-4 py-5" style="margin-top: -80px;">

                                    <div style="margin-top: 30px;">
                                        <table class="table">

                                            <thead class="table-dark">
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Order Date</th>
                                                    <th scope="col">Order Amount</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Order Details</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($Orders as $key => $Order)
                                                    <tr>

                                                        <th scope="row">{{ $key + 1 }}</th>
                                                        <td>{{ $Order->created_at }}</td>
                                                        <td>{{ $Order->amount }} BDT</td>
                                                        <td>
                                                            {{ $Order->status }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('front.order.receipt', $Order->id) }}"
                                                                class="btn btn-warning">Order Reciept</a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('frontuser.order.track', $Order->id) }}"
                                                                class="btn btn-success my-2">Tracking Status</a>
                                                            @if ($Order->status != 'cancel')
                                                                <a href="{{ route('cancel.order', $Order->id) }}"
                                                                    class="btn btn-danger">Cancel</a>
                                                            @endif
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>







                        </div><!-- End Bordered Tabs -->



                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
