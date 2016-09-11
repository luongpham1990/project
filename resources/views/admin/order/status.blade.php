@extends('admin.master')
@section('status')
@section('controller','Order Detail')


<div class="col-lg-7" style="padding-bottom:120px">
    <h4>Your order status:</h4>

    <ul class="list-group">
        <li class="list-group-item">
            <span class="prefix">Order Number:</span>

            <h3><span class="label label-success">{!! $detail['ordernumber'] !!}</span></h3>
        </li>
        <li class="list-group-item">
            <span class="prefix">Customer Name:</span>

            <h3><span class="label label-success">{!! $detail['name'] !!}</span></h3>
        </li>
        <li class="list-group-item">
            <span class="prefix">Vip Level:</span>

            <h3><span class="label label-success">{!! $detail['vip_level'] !!}</span></h3>
        <li class="list-group-item">
            <span class="prefix">Product Name:</span>

            <h3><span class="label label-success">{!! $detail['pname'] !!}</span></h3>
        </li>
        <li class="list-group-item">
            <span class="prefix">Price:</span>

            <h3><span class="label label-success">{!! $detail['price'] !!}</span></h3>
        </li>
        <li class="list-group-item">
            <span class="prefix">Address:</span>

            <h3><span class="label label-success">{!! $detail['address'] !!}</span></h3>
        </li>
        <li class="list-group-item">
            <span class="prefix">Phone Number:</span>

            <h3><span class="label label-success">{!! $detail['phone'] !!}</span></h3>
        </li>
        <li class="list-group-item">
            <span class="prefix">Product Status:</span>

            <h3><span class="label label-success">{!! $detail['stt'] !!}</span></h3>
        </li>
        <li class="list-group-item">You can find out latest status of your order with the following link:</li>
        <li class="list-group-item"><a href="//tracking/link/goes/here">//tracking/link/goes/here</a></li>

    </ul>
</div>
@stop