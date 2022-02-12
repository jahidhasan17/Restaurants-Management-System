<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class CartController extends Controller
{
    protected $request;

    function __construct(Request $request) {
        $this->request = $request;
    }

    public function addToCart(){
        if(!session()->has('cartList')){
            session()->put('cartList', array());
            session()->put('total', 0);
        }
        $cartList = session('cartList');
        $total = session('total');
        $total += $this->request['price'] * $this->request['qty'];
        $cartList[count($cartList)] = array(
            'p_id' => $this->request['id'],
            'p_title' => $this->request['title'],
            'p_price' => $this->request['price'],
            'p_qty' => $this->request['qty'],
        );
        session()->put('cartList', $cartList);
        session()->put('total', $total);
        return redirect(url('order'));
    }

    public function removeToCart(){
        $cartList = session('cartList');
        $total = session('total');

        foreach($cartList as $key => $value){
            if($value['p_id'] === $this->request['id']){
                $total -= $value['p_price'] * $value['p_qty'];
                unset($cartList[$key]);
                break;
            }
        }

        session()->put('cartList', $cartList);
        session()->put('total', $total);
        return redirect(url('order'));
    }

    public function placeOrder(){

        $order = new Order();
        $order->customer_id = session('current_user_id');
        $order->total_amount = session('total');
        $order->order_status = "Ordered";
        $order->save();

        $cartList = session('cartList');

        foreach($cartList as $key => $value){
            $orderDetails = new OrderDetail();
            $orderDetails->order_id = $order->id;
            $orderDetails->food_id = $value['p_id'];
            $orderDetails->qty = $value['p_qty'];
            $orderDetails->total = $value['p_price'] * $value['p_qty'];
            $orderDetails->save();
        }
        session()->flush();

        return redirect(url('order'));
    }
}
