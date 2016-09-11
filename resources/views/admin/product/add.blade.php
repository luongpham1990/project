@extends('admin.master')
@section('addproduct')
@section('controller','Category')

<form enctype="multipart/form-data" action="{!! route('admin.product.postAdd') !!}" method="POST">
        <!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">




        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>

        <div class="alert-danger">

            @if(count('errors') >0)
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {!! $error !!}
                        </li>
                    @endforeach
                </ul>

            @endif


        </div>

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
                   value={!! old('txtName') !!} >
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please Enter Password"
                   value={!! old('txtPrice') !!} >
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea class="form-control" rows="3" name="txtIntro"
                      value="old('txtIntro')">{!! old('txtIntro') !!}</textarea>
            <script type="text/javascript">ckeditor("txtIntro")</script>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent') !!}</textarea>
            <script type="text/javascript">ckeditor("txtContent")</script>
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages">
        </div>
        <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords"
                   value="{!! old('txtKeywords') !!}"/>
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" name="txtDescription" rows="3">{!! old('txtDescription') !!}</textarea>
        </div>


        {{--<div class="form-group">--}}
        {{--<label>Product Status</label>--}}
        {{--<label class="radio-inline">--}}
        {{--<input name="rdoStatus" value="1" checked="" type="radio">Visible--}}
        {{--</label>--}}
        {{--<label class="radio-inline">--}}
        {{--<input name="rdoStatus" value="2" type="radio">Invisible--}}
        {{--</label>--}}
        {{--</div>--}}
        <button type="submit" class="btn btn-default">Product Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
</div>



<div class="col-md-4">
    @for($i=1;$i<10;$i++)
        <div class="form-group">
            <label>Image Product Detail {!! $i !!}</label>
            <input type="file" name="fProductDetail[]"/>

        </div>
    @endfor

</div>



<form>

@stop