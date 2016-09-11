@extends('admin.master')
@section('action')
@section('controller','Category')


            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category Parent</th>
                    <th>Status</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
            <?php $stt=0; ?>
                @foreach($data as $items)

            <?php $stt = $stt +1; ?>

                 <tr class="odd gradeX" align="center">

                    <td>{!! $stt !!}</td>
                    <td>{!! $items["name"] !!}</td>
                    <td>

                        @if($items["parent_id"] == 0 )
                            {!! "None" !!}

                        @else

                            <?php
                            $parent= DB::table('cates')->where('id',$items["parent_id"])->first();
                            echo $parent->name;
                            ?>


                        @endif

                    </td>
                    <td>Hiện</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="xacnhan('Bạn có chắc xoá không')" href="{!! route('admin.cat.getDelete',$items["id"]) !!}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('admin.cat.getEdit',$items["id"]) !!}">Edit</a></td>
                </tr>

                @endforeach



                {{--<tr class="even gradeC" align="center">--}}
                    {{--<td>2</td>--}}
                    {{--<td>Bóng Đá</td>--}}
                    {{--<td>Thể Thao</td>--}}
                    {{--<td>Ẩn</td>--}}
                    {{--<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>--}}
                    {{--<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>--}}
                {{--</tr>--}}
                </tbody>
            </table>

@stop