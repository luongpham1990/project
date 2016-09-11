@extends('admin.master')
@section('EditOrder')
@section('controller','Edit Order')

<div class="col-lg-7" style="padding-bottom:120px">
    <form action="{!! route('admin.order.postEdit',$order['id']) !!}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Username"
                   value="{!! old('txtName', isset($order) ? $order['name'] :null) !!}"/>
        </div>
        <div class="form-group">
            <label>Vip Level</label>
            <input class="form-control" name="txtLevel" placeholder="Please Enter Password"
                   value="{!! old('txtLevel', isset($order) ? $order['vip_level'] :null) !!}"/>
        </div>
        <div class="form-group">
            <label>Product Name</label>
            <input class="form-control" name="txtpName" placeholder="Please Enter Username"
                   value="{!! old('txtpName', isset($order) ? $order['pname'] :null) !!}"/>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please Enter Password"
                   value="{!! old('txtPrice', isset($order) ? $order['price'] :null) !!}"/>
        </div>
        <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" rows="3"
                      name="txtAddress">{!! old('txtAddress', isset($order) ? $order['address'] :null) !!}</textarea>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input class="form-control" name="txtPhone" placeholder="Please Enter Phone Number"
                   value="{!! old('txtAddress', isset($order) ? $order['phone'] :null) !!}"/>
        </div>


        {{--<div class="form-group">--}}
            {{--<label>Product Status</label>--}}
            {{--<input class="form-control" name="txtStt" placeholder="Please Enter Phone Number"--}}
                   {{--value="{!! old('txtStt', isset($order) ? $order['stt'] :null) !!}"/>--}}
        {{--</div>--}}

        <div class="form-group">
            <label>Product Status</label>
            <label class="radio-inline">
                <input name="rdoStatus" value="Pending"
                       @if($order['stt'] =='Pending')

                               {{ 'checked="checked"' }}
                       @endif
                       type="radio">Pending
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="Shipped"
                       @if($order['stt'] =='Shipped')

                       {{ 'checked="checked"' }}
                       @endif

                       type="radio">Shipped
            </label>
        </div>


        <button type="submit" class="btn btn-default">Product Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
        <form>
</div>

@stop