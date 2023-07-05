@extends('frontend.master')
@section('contents')

<style>
    body {
        color: #000;
        overflow-x: hidden;
        height: 100%;
        background-color: white;
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

<div class="container">
    <div class="card">
        <div class="row d-flex justify-content-between px-3 top">
            <div class="d-flex">
                <h5>ORDER :<span class="text-primary font-weight-bold">{{$order->id}}</span></h5>
            </div>
            <div class="d-flex flex-column text-sm-right">
                <p class="mb-0">Order Date <span>{{$order->created_at}}</span></p>
            </div>
        </div>
        <!-- Add class 'active' to progress -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <ul id="progressbar" class="text-center">


                    @if($order->status=='pending')
                    <li class="active step0"></li>
                        <li class="step1">
                        <li class="step2">
                        <li class="step3">
                    @endif
                        @if($order->status=='processing')
                            <li class="active step0"></li>
                            <li class="active step1"  style="color:white"></li>
                            <li class="step2">
                            <li class="step3">
                        @endif
                        @if($order->status=='dispatched')
                            <li class="active step0"></li>
                            <li class="active step1" style="color:white"></li>
                            <li class="active step2" style="color:white"></li>
                            <li class="step3">
                        @endif

                    @if($order->status=='delivered')
                            <li class="active step0"></li>
                            <li class="active step1" style="color:white"></li>
                            <li class="active step2" style="color:white"></li>
                            <li class="active step3" style="color:white"></li>
                        @endif

                </ul>
            </div>
        </div>
        <div class="row justify-content-between top">

            <div class="row flex-column icon-content">
                <div class="icon-size: 20px">
                    <i class="bi bi-card-checklist"></i>
                </div>
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Pending</p>
                </div>
            </div>
            <div class="row flex-column icon-content">
                <i class="bi bi-box-seam"></i>
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Processing</p>
                </div>
            </div>
            <div class="row flex-column icon-content">
                <i class="bi bi-truck"></i>
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Dispatched</p>
                </div>
            </div>
            <div class="row flex-column icon-content">
                <i class="bi bi-folder-check"></i>
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Delivered</p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
