<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\ProductType;
use App\Slide;
use Illuminate\Http\Request;
use Session;
use App\User;
use Hash;
use Auth;
use App\Customer;
use App\Bill;
use App\BillDetail;
class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
        $new_product =  Product::inRandomOrder()->limit(4)->get();
        $promo_product =  Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.home',compact('slide','new_product','promo_product'));
    }

    public function getProductType($type){
        $products = Product::where('type_id',$type)->get();
        $related_products = Product::where('type_id','<>',$type)->inRandomOrder()->limit(3)->get();
        $product_type     = ProductType::where('id',$type)->first();
        $types = ProductType::all();

        return view('page.product_type',compact('products','related_products','types','product_type'));
    }

    public function getProductDetail($id){
        $detail = Product::where('id',$id)->first();
        $similar = Product::where('type_id',$detail->type_id)->inRandomOrder()->limit(3)->get();
        return view('page.product_detail',compact('detail','similar'));
    }

    public function getContact(){
        return view('page.contact');
    }

    public function getAbout(){
        return view('page.about');
    }

    public function addToCart($id){
        $product  = Product::find($id);
        $old_cart = Session('cart')? Session::get('cart'):null;
        $cart     = new Cart($old_cart);
        $cart->add($product, $id);
        Session::put('cart',$cart);
        return redirect()->back();
    }

    public function deleteItemCart($id){
        $old_cart  = Session::has('cart')?Session::get('cart'):null;
        $cart      = new Cart($old_cart);
        $cart->removeItem($id);
        if(count($cart->items)>0)
            Session::put('cart',$cart);
        else
            Session::forget('cart');
        return redirect()->back();
    }
    public function getLogin(){
        return view('page.login');
    }
    public function getSignup(){
        return view('page.signup');
    }    
    public function postSignup(Request $req){
        $this->validate($req,
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:32',
                're_password' => 'required|same:password'
            ],
            [
                'email.unique' => 'Email đã sử dụng',
                're_password.same' =>'Mật khẩu nhập lại không trùng',
                'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
                'password.max' => 'Mật khẩu quá dài, giới hạn 32 kí tự'
            ]);
        $user = new User();
        $user ->full_name = $req-> fullname;
        $user ->email     = $req ->email;
        $user ->password  = Hash::make($req->password);
        $user ->phone     = $req->phone;
        $user ->address   = $req ->address;
        $user ->save();
        return redirect()->back() ->with('thanhcong','Tạo tài khoản thành công');
    }
    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:32'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu tối đa 32 kí tự'
            ]
            );
            $credentials = array('email'=>$req->email,'password'=> $req->password);
            if(Auth::attempt($credentials)){
                return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công | Login Successed']);
            }
            else{
                return redirect()->back()->with(['flag'=>'danger','message'=> 'Đăng nhập không thành công | Login Failed']);
            }
            
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('home');
    }
    public function getSearch(Request $req){
        $product = Product::Where('name','like','%'.$req->key.'%')
                            ->orWhere('unit_price',$req->key)
                            ->get();
        return view('page.search',compact('product'));
    }
    public function getCheckout(){
        if(Session::has('cart')){
            $old_cart = Session::get('cart');
            $cart = new Cart($old_cart);
            return view('page.checkout',
                        [
                            'product_cart' =>$cart->items, 
                            'totalPrice' =>$cart->total_price, 
                            'totalQty'=>$cart->total_qty
                        ]);
        }
    }   
    public function postCheckout(Request $req){
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number =$req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->customer_id= $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->total_price;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach($cart->items as $key=>$value){
            $bill_detail = new BillDetail;
            $bill_detail->bill_id = $bill->id;
            $bill_detail->product_id = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('message', 'Ðặt hàng thành công');
    }
}
