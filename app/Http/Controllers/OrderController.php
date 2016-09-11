<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;
use File;



class OrderController extends Controller
{
	public function getList()
	{
		$data = Order::select('ordernumber','id','name','pname','price','vip_level','address','phone','stt','created_at','updated_at')->orderBy('stt','ASC')->inRandomOrder()->get()->toArray();
		return view('admin.order.list',compact('data'));
	}

	public function getAdd()
	{

		return view('admin.order.add');
	}

	public function postAdd(Request $request)
	{

		$order = new Order();

		$order->ordernumber = $request->txtordernumber;
		$order->name = $request->txtName;
		$order->vip_level = $request->txtLevel;
		$order->pname = $request->txtpName;
		$order->price = $request->txtPrice;
		$order->address = $request->txtAddress;
		$order->phone = $request->txtPhone;
		$order->stt = $request->rdoStatus;


		$order->save();

		return redirect()->route('admin.order.getList');
	}

	public function getStatus($id){
		$detail = Order::find($id);
		return view('admin.order.status',compact('detail'));
	}

	public function getEdit($id){
		$order = Order::find($id); //nếu có toArray() thì không tìm được ID sẽ lỗi
		return view('admin.order.edit',compact('order'));

	}

	public function postEdit(Request $request ,$id){

		$update = Order::find($id);

		$update->name = $request->txtName;
		$update->pname = $request->txtName;
		$update->vip_level = $request->txtLevel;
		$update->price = $request->txtPrice;
		$update->address = $request->txtAddress;
		$update->phone = $request->txtPhone;
		$update->stt = $request->rdoStatus;

		$update->save();

		return redirect()->route('admin.order.getList');
	}
}
