@extends('admin.master')
@section('addorder')
@section('controller','ADD ORDER')


                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{!! route('admin.order.postAdd') !!}" method="POST">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label>Order Number</label>
                                <input class="form-control" name="txtordernumber" placeholder="Please Enter Order Number" />
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Vip Level</label>
                                <input class="form-control" name="txtLevel" placeholder="Please Enter Vip Level" />
                            </div>
                            <div class="form-group">
                                <label>Product Name</label>
                                <input class="form-control" name="txtpName" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="txtPrice" placeholder="Please Enter Price" />
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" rows="3" name="txtAddress"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Phone Number</label>
                                <input class="form-control" name="txtPhone" placeholder="Please Enter Phone Number" />
                            </div>
                            <div class="form-group">
                                <label>Product Status</label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="Pending"  type="radio">Pending
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="Shipped"  type="radio">Shipped
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Product Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
 @stop