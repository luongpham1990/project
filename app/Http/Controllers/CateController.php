<?php

namespace App\Http\Controllers;

use App\Cate;
use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;
use App\Http\Requests\CateRequest;

class CateController extends Controller
{

//    public function index(){
//
//        $cate = Cate::all();
//        print_r($cate);
//        return view('admin.cate.add',compact('cate'));
//
//
//
//
//    }

    public function getAdd(){

        $parent = Cate::select('id','name','parent_id')->get()->toArray();

        return view('admin.cate.add',array(
            'parent' => $parent
        ));
    }

    public function getList(){

        $data = Cate::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
        return view('admin.cate.list',compact('data'));
    }

    public function postAdd(CateRequest $request){
        $cate = new Cate();

        $cate->name = $request->txtCateName;
        $cate->alias = changeTitle($request->txtCateName);
        $cate->	order = $request->txtOrder;
        $cate->parent_id = $request->sltParent;
        $cate->keywords = $request->txtKeywords;
        $cate->	description = $request->txtDescription;

        $cate->save();

        return redirect()->route('admin.cat.list')->with(['flash_level'=>'success','flash_message'=>'SUSSCESS okie roi nhe',]);
    }

    public function getDelete($id) {


        $parent = Cate::where('parent_id',$id)->count();
        if($parent ==0) {
            $cate = Cate::find($id);

            $cate->delete();

            return redirect()->route('admin.cat.list')->with(['flash_level' => 'success', 'flash_message' => 'SUSSCESS XOÁ OKIE RỒI NHÉ']);
        }else {

            return redirect()->route('admin.cat.list')->with(['flash_level' => 'danger', 'flash_message' => 'Không được xoá']);

        }
    }

    public function getEdit($id){
        $data = Cate::find($id)->toArray();
        $parent = Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.cate.edit',compact('parent','data','id'));
    }

    public function postEdit( Request $request,$id){


        $this->validate($request,
            ['txtCateName' => 'required'],
            ['txtCateName.required' => 'Nhap ten vao nghe chua  ']

            );

//        $v = Validator::make($request->all(), [
//            'name' => 'required',
//            'alias' => 'required',
//            'order' => 'required'
//        ]);
//        if ($v->fails()) {
//            return redirect()->back()->withErrors($v->errors());
//        }

        $update = Cate::find($id);

//        print_r($update);

        $update->name = $request->txtCateName;
        $update->order = $request->txtOrder;
        $update->keywords = $request->txtKeywords;
        $update->description = $request->txtDescription;

        $update->save();

        return redirect()->route('admin.cat.list');

    }


}
