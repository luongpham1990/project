@extends('admin.master')
@section('listproduct')
@section('controller','Category')
        <!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr align="center">
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Date</th>
        <th>Category</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>

    <?php $stt = 0; ?>
    @foreach($data as $list)
    <?php $stt = $stt +1 ?>
        <tr class="odd gradeX" align="center">
            <td>{!! $stt !!}</td>
            <td>{!! $list['name'] !!}</td>
            <td>{!! number_format($list['price'],0,",",".") !!} VNĐ</td>
            <td>{!! \Carbon\Carbon::createFromTimestamp(strtotime($list["created_at"]))->diffForHumans() !!}</td>
            <td>
                <?php $cate = DB::table('cates')->where('id',$list['cate_id'])->first();   ?>
                @if(!empty($cate->name))
                    {!! $cate->name !!}
                @endif
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a  href="{!! route('admin.product.getDelete',$list['id']) !!}" onclick="return xacnhan('Bạn có chắc xoá không')" > Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('admin.product.getEdit',$list['id']) !!}">Edit</a></td>
        </tr>

    @endforeach
    </tbody>

</table>
@stop