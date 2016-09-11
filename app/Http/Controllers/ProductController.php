<?php

namespace App\Http\Controllers;

use App\Cate;
use App\ProductImages;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Http\Requests\ProductRequest;
use File;


class ProductController extends Controller
{

	public function getList()
	{

		$data = Product::select('name', 'id', 'price', 'cate_id', 'created_at')->orderBy('id', 'DESC')->get()->toArray();
		return view('admin.product.list', compact('data'));
	}


	public function getAdd()
	{
		$cate = Cate::select('name', 'id', 'parent_id')->get()->toArray();
		return view('admin.product.add', compact('cate'));
	}

	public function postAdd(ProductRequest $request)
	{
//		dd($request->allFiles());
//
		$file_name = $request->file('fImages')->getClientOriginalName();

		$product = new Product();

//		$this->validate($request,
//			['txtName' => 'required'],
//			['txtName.required' => 'Nhap ten vao di nhe']
//
//			);

		$product->name = $request->txtName;
		$product->price = $request->txtPrice;
		$product->intro = $request->txtIntro;
		$product->content = $request->txtContent;
		$product->image = $file_name;
		$product->keywords = $request->txtKeywords;
		$product->description = $request->txtDescription;
		$product->user_id = 1;
		$product->cate_id = $request->sltParent;

		$des = base_path() . '/public/resources/upload';
		$request->file('fImages')->move($des, $file_name);

		$product->save();
		$product_id = $product->id;

		$des1 = base_path() . '/public/resources/upload/detail';


		if ($request->hasFile('fProductDetail')) {
			foreach ($request->file('fProductDetail') as $file) {
				$product_img = new ProductImages();
				if (isset($file)) {
					$product_img->image = $file->getClientOriginalName();
					$product_img->product_id = $product_id;
					$file->move($des1, $file->getClientOriginalName());
					$product_img->save();

				}

			}
		}


		return redirect()->route('admin.product.getList')->with(['flash_level' => 'success', 'flash_message' => 'Thêm thành công rồi nhé']);;


	}

	public function getDelete($id){
		$product_detail = Product::find($id)->pimages->toArray();
		foreach ($product_detail as $value) {
			File::delete(base_path() . '/public/resources/upload/detail/'.$value["image"]);
			
		}
		$product = Product::find($id);
		File::delete(base_path() . '/public/resources/upload/' .$product->image);
		$product->delete($id);

		return redirect()->route('admin.product.getList')->with(['flash_level' => 'success', 'flash_message' => 'Xoá thành công rồi nhé ']);;

	}

	public function getEdit($id){
		$cate = Cate::select('id','name','parent_id')->get()->toArray();
		$product = Product::find($id);
		$product_img = Product::find($id)->pimages;

		return view('admin.product.edit',compact('cate','product','product_img'));
	}

}
