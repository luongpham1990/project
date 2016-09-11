@extends('admin.master')
@section('editproduct')
@section('controller','Category')
<style>

    .img_current {
        width: 150px;
    }

    .img_detail {
        width: 300px;
        margin-bottom: 20px;
    }

    .icon_del{
        position: relative ;
        top: -80px;
        left: -20px;
    }
    #insert{
        margin-top: 20px;
    }
</style>


<form action="" method="POST">
    <div class="col-lg-7" style="padding-bottom:120px">


        <div class="form-group">

            <label>Category Parent</label>
            <select class="form-control" name="sltParent">


                <option value="0">Please Choose Category</option>

                <?php cate_parent($cate, 0, "--", old('sltParent')); ?>


            </select>
        </div>

        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Username"
                   value="{!! old('txtName',isset($product) ? $product['name'] :  null ) !!}"/>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please Enter Price"
                   value="{!! old('txtPrice',isset($product) ? $product['price'] :  null ) !!}"/>
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea class="form-control" rows="3"
                      name="txtIntro">{!! old('txtIntro',isset($product) ? $product['intro'] :  null ) !!}</textarea>
            <script type="text/javascript">ckeditor("txtIntro")</script>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="3"
                      name="txtContent">{!! old('txtContent',isset($product) ? $product['content'] :  null ) !!}</textarea>
            <script type="text/javascript">ckeditor("txtContent")</script>
        </div>
        <div class="form-group">
            <label>Image Current</label>
            <img src="{!! asset('/resources/upload/'.$product['image']) !!}" class="img_current"/>

        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages">
        </div>
        <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords"
                   value="{!! old('txtKeywords',isset($product) ? $product['keywords'] :  null ) !!}"/>
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3"
                      name="txtDescription">{!! old('txtDescription',isset($product) ? $product['description'] :  null ) !!}</textarea>
        </div>
        <div class="form-group">
            <label>Product Status</label>
            <label class="radio-inline">
                <input name="rdoStatus" value="1" checked="" type="radio">Visible
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="2" type="radio">Invisible
            </label>
        </div>
        <button type="submit" class="btn btn-default">Product Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>


    </div>


    <div class="col-md-4">
        @foreach($product_img as $key => $item)
            <div class="form-group" id="hinh{!! $key !!}">
                <img src="{!! asset('/resources/upload/detail/'.$item['image'])  !!}" class="img_detail"/>
                <a id="del-img-demo" class="btn btn-danger btn-circle icon_del"> <i class="fa fa-times"></i> </a>
                <input type="file" name="fProductDetail[]" />

            </div>


        @endforeach

            <button type="button" class="btn btn-primary" id="addImages">ADD Images</button>
            <div id="insert"></div>
    </div>

    <form>



@stop