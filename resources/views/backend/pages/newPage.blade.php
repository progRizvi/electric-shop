@extends('backend.master')
@section('contents')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.newPage')}}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                        <!-- <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div> -->

                        <div class="card-body">
                            <h5 class="card-title">Recent Order <span>| Today</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <div class="ps-3">
                                    <h6> {{ $totalOrder }} </h6>
                                    

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">

                        <!-- <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div> -->

                        <div class="card-body">
                            <h5 class="card-title">Revenue <span>| This Month</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $totalAmount }} BDT</h6>
                                   

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-xl-12">

                    <div class="card info-card customers-card">

                        <!-- <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div> -->

                        <div class="card-body">
                            <h5 class="card-title">Customers <span>| This Year</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $totalCustomer }}</h6>
                                    

                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Customers Card -->

                @php
                $jan=$totalOrderCount[0];
                $feb=$totalOrderCount[1];
                $mar=$totalOrderCount[2];
                $apr=$totalOrderCount[3];
                $may=$totalOrderCount[4];
                $jun=$totalOrderCount[5];
                $jul=$totalOrderCount[6];
                $aug=$totalOrderCount[7];
                $sep=$totalOrderCount[8];
                $oct=$totalOrderCount[9];
                $nov=$totalOrderCount[10];
                $dec=$totalOrderCount[11];
                @endphp

                <!-- Reports -->
                <div class="col-lg-12">
                    <div class="card">

                        <!-- <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div> -->

                        <div class="card-body">
                            <h5 class="card-title">Reports <span>/This Month</span></h5>

                            <!-- Line Chart -->
                            <div id="reportsChart"></div>

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                            <canvas id="myChart" style="width:100%;max-width:1200px"></canvas>

                            <script>
                                var xValues = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                                var yValues = ["{{$jan}}","{{$feb}}","{{$mar}}","{{$apr}}","{{$may}}","{{$jun}}","{{$jul}}","{{$aug}}","{{$sep}}","{{$oct}}","{{$nov}}","{{$dec}}",'50'];
                                var barColors = ["red", "green", "blue", "orange", "brown", "pink", "tan", "gray"];

                                new Chart("myChart", {
                                    type: "bar",
                                    data: {
                                        labels: xValues,
                                        datasets: [{
                                            backgroundColor: barColors,
                                            data: yValues
                                        }]
                                    },
                                    options: {
                                        legend: {
                                            display: false
                                        },
                                        title: {
                                            display: true,
                                            text: "Order Based on Month"
                                        }
                                    }
                                });
                            </script>
                            <!-- End Line Chart -->

                        </div>

                    </div>
                </div><!-- End Reports -->

                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <!-- <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div> -->

                        <div class="card-body">
                            <h5 class="card-title">Total Orders <span>| This Month</span></h5>

                            <table class="table">

                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Order Name</th>
                                        <th scope="col">Order Email</th>
                                        <th scope="col">Order Phone</th>
                                        <th scope="col">Order Amount</th>
                                        <th scope="col">Order Status</th>
                                        <th scope="col">Order Address</th>
                                        <th scope="col">Transaction ID</th>
                                        <th scope="col">Currency</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Orders as $Order)
                                    <tr>
                                        <th scope="row">{{$Order->id}}</th>
                                        <td>{{$Order->name}}</td>
                                        <td>{{$Order->email}}</td>
                                        <td>{{$Order->phone}}</td>
                                        <td>{{$Order->amount}}</td>
                                        <td>{{$Order->status}}</td>
                                        <td>{{$Order->address}}</td>
                                        <td>{{$Order->transaction_id}}</td>
                                        <td>{{$Order->currency}}</td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>

                            {{$Orders->Links()}}

                        </div>

                    </div>
                </div><!-- End Recent Sales -->

                <!-- Top Selling -->
                <!-- End Top Selling -->

            </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

            <!-- Recent Activity -->
            

            <!-- Budget Report -->
            <!-- End Budget Report -->

            <!-- Website Traffic -->
            <!-- End Website Traffic -->

            <!-- News & Updates Traffic -->
            <!-- End sidebar recent posts-->

                </div>
            </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

    </div>
</section>
@endsection