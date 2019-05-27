<?php

namespace App\Http\Controllers;


use App\Product;
use App\ProductType;
use App\Services\ProductService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $products = Product::paginate(15);
        return view('admin.dashboard',compact('products'));
    }

    public function store(Request $request){
        $input = $request->all();
        $file  = $input['image'];
        $path  = 'upload/'.$input['type_id'];
        if (!file_exists($path)) {
            mkdir($path);
        }
        $file->move($path, $file->getClientOriginalName());
        $input['image'] = $file->getClientOriginalName();
        if (ProductService::create($input)) {
            return redirect()->action('AdminController@index')
                ->with('message', trans('Product create successfully!'));
        }
        return redirect()->action('AdminController@index')
            ->with('error', trans('Failed to created product!'));
    }

    public function create(){
        $type     = ProductType::all();
        return view('admin.create',compact('type'));
    }

    public function destroy(){
        var_dump("ok");die;
    }


}