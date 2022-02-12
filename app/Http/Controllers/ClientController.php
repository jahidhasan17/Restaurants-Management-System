<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Reservation;

class ClientController extends Controller
{

    protected $request;

    function __construct(Request $request) {
        $this->request = $request;
    }

    public function getIndexView(){
        return view('Client.index');
    }

    public function getLoginView(){

        if(isset($this->request['submit'])){
            $email = $this->request['email'];
		    $password = $this->request['password'];
            $result = Customer::where(['email' => $email, 'password' => $password])->get();

            if(count($result) > 0){
                session()->put('current_user', $result[0]->full_name);
                session()->put('current_user_id', $result[0]->id);
                return redirect(url('/'));
            }
            return redirect(url('/login'));
        }

        return view('Client.login');
    }

    public function getRegisterView(){

        if(isset($this->request['submit'])){
            $customer = new Customer();
            $customer->full_name = $this->request['full_name'];
            $customer->contact = $this->request['contact'];
            $customer->location = $this->request['location'];
            $customer->email = $this->request['email'];
            $customer->username = $this->request['username'];
            $customer->password = $this->request['password'];
            $customer->save();
            return redirect(url('login'));
        }

        return view('Client.register');
    }

    public function logout(){
        session()->flush();
        return redirect(url('/'));
    }


    public function order(){
        $categoryList = Category::all();
        $foodList = Food::all();
        
        return view('Client.online-order', [
            'categoryList' => $categoryList,
            'foodList' => $foodList,
        ]);
    }

    public function tableReservation(){

        if(isset($this->request['submit'])){
            $reservation = new Reservation();
            $reservation->customer_id = session('current_user_id');
            $reservation->guest = $this->request['guest'];
            $reservation->re_date = $this->request['date'];
            $reservation->re_time = $this->request['time'];
            $reservation->suggestions = $this->request['suggestions'];
            $reservation->status = "pending";
            $reservation->save();   

            return redirect(url('table-reservation'));
        }

        return view('Client.table-reservation');
    }
}
