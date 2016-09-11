@extends('admin.master')
@section('orderlist')
@section('controller','ORDER LIST')


<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr align="center">
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Date</th>
        <th>Status</th>
        <th>Detail</th>
        <th>Edit</th>
    </tr>
    </thead>

    <tbody>
    <?php $stt= 0; ?>
    @foreach($data as $list)
    
        <?php
                $stt = $stt +1;

        ?>

        <tr class="odd gradeX" align="center">
            <td>{!! $stt !!}</td>
            <td>{!! $list['name'] !!}</td>
            <td>{!! number_format($list['price'],0,",",".")  !!} VND</td>
            <td>

                    {!! \Carbon\Carbon::createFromTimestamp(strtotime($list["created_at"]))->diffForHumans() !!}



            </td>
            <td>{!! $list['stt'] !!}</td>
            <td class="center"><i class="fa fa-search  fa-fw"></i><a href="{!! route('admin.order.getStatus',$list['id']) !!}"> Detail</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('admin.order.getEdit',$list['id']) !!}">Edit</a></td>
        </tr>

    @endforeach

    </tbody>

</table>
@stop