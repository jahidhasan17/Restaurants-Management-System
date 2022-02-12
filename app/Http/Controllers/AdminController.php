<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Reservation;

class AdminController extends Controller
{

    protected $request;

    function __construct(Request $request) {
        $this->request = $request;
    }

    public function getAdminIndexView(){
        return view('Admin.index');
    }

    public function getManageAdminView(){

        $adminList = Admin::all();

        return view('Admin.admin.manage-admin', [
            'adminList' => $adminList,
        ]);
    }

    public function getAddAdminView(){

        if(isset($this->request['submit'])){
            $admin = new Admin();
            $admin->full_name = $this->request['full_name'];
            $admin->contact = $this->request['contact'];
            $admin->location = $this->request['location'];
            $admin->email = $this->request['email'];
            $admin->username = $this->request['username'];
            $admin->password = $this->request['password'];
            $admin->save();
            return redirect(url('admin/manage-admin'));
        }
        return view('Admin.admin.add-admin');
    }


    public function getUpdateAdminView(){
        if(isset($this->request['submit'])){
            $id = $this->request['id'];


            $full_name = $this->request['full_name'];
            $contact = $this->request['contact'];
            $location = $this->request['location'];
            $email = $this->request['email'];
            $username = $this->request['username'];
            $current_password = $this->request['current_password'];
            $new_password = $this->request['new_password'];
            $confirm_password = $this->request['confirm_password'];

            if($new_password !== $confirm_password){
                return redirect(url('admin/manage-admin'));
            }

            Admin::where(['id' => $id])->delete();

            $admin = new Admin();
            $admin->full_name = $full_name;
            $admin->contact = $contact;
            $admin->location = $location;
            $admin->email = $email;
            $admin->username = $username;
            $admin->password = $new_password;
            $admin->save();
            return redirect(url('admin/manage-admin'));

        }else{
            $id = $this->request['id'];
            $adminItem = Admin::where(['id' => $id])->get();
            return view('Admin.admin.update-admin', [
                'adminItem' => $adminItem[0],
            ]);
        }
    }

    public function getDeleteAdminView(){
        $id = $this->request['id'];
        Admin::where(['id' => $id])->delete();

        return redirect(url('admin/manage-admin'));
    }

    public function getAdminLoginView(){
        if(isset($this->request['submit'])){
            $email = $this->request['email'];
		    $password = $this->request['password'];
            $result = Admin::where(['email' => $email, 'password' => $password])->get();

            if(count($result) > 0){
                session()->put('current_admin_user', $result[0]->full_name);
                return redirect(url('admin'));
            }
            return redirect(url('admin/login'));
        }

        return view('Admin.login');
    }

    public function adminLogout(){
        session()->flush();
        return redirect('/admin/login');
    }

    public function getManageCategoryView(){

        $categoryList = Category::all();

        return view('Admin.category.manage-category',[
            'categoryList' => $categoryList,
        ]);
    }

    public function getAddCategoryView(){

        if(isset($this->request['submit'])){
            $category = new Category();
            $category->title = $this->request['title'];
            $category->image_name = $this->request['image']->getClientOriginalName();
            $category->active = $this->request['active'];
            $category->save();
            return redirect(url('admin/manage-category'));
        }

        return view('Admin.category.add-category');
    }

    public function getUpdateCategoryView(){

        if(isset($this->request['submit'])){
            $id = $this->request['id'];
            Category::where(['id' => $id])->delete();


            $image_name = $this->request['current_image'];
            $title = $this->request['title'];
            if(isset($this->request['image'])){
                $image_name = $this->request['image']->getClientOriginalName();
            }
            $active = $this->request['active'];

            $category = new Category();
            $category->title = $title;
            $category->image_name = $image_name;
            $category->active = $active;
            $category->save();
            return redirect(url('admin/manage-category'));
        }else{
            $id = $this->request['id'];
            $categoryItem = Category::where(['id' => $id])->get();
            return view('Admin.category.update-category', [
                'categoryItem' => $categoryItem[0],
            ]);
        }
    }

    public function getDeleteCategoryView(){
        $id = $this->request['id'];
        Category::where(['id' => $id])->delete();
        return redirect(url('admin/manage-category'));
    }


    public function getManageFoodView(){

        $foodItems = Food::all();

        return view('Admin.food.manage-food', [
            'foodItems' => $foodItems,
        ]);
    }

    public function getAddFoodView(){

        if(isset($this->request['submit'])){
            $food = new Food();
            $food->title = $this->request['title'];
            $food->price = $this->request['price'];
            $food->category_id = $this->request['category'];
            $food->active = $this->request['active'];
            $food->image_name = $this->request['image_name']->getClientOriginalName();
            $food->save();
            return redirect(url('admin/manage-food'));
        }

        $categoryList = Category::where(['active' => 'Yes'])->get();

        return view('Admin.food.add-food', [
            'categoryList' => $categoryList,
        ]);
    }

    public function getUpdateFoodView(){
        if(isset($this->request['submit'])){
            $id = $this->request['id'];
            Food::where(['id' => $id])->delete();

            $image_name = $this->request['current_image'];
            $title = $this->request['title'];
            if(isset($this->request['image_name'])){
                $image_name = $this->request['image_name']->getClientOriginalName();
            }
            $active = $this->request['active'];
            $price = $this->request['price'];
            $category_id = $this->request['category'];

            $food = new Food();
            $food->title = $title;
            $food->price = $price;
            $food->image_name = $image_name;
            $food->category_id = $category_id;
            $food->active = $active;
            $food->save();
            return redirect(url('admin/manage-food'));
        }else{
            $id = $this->request['id'];
            $foodItem = Food::where(['id' => $id])->get();
            $categoryList = Category::all();

            return view('Admin.food.update-food', [
                'foodItem' => $foodItem[0],
                'categoryList' => $categoryList,
            ]);
        }
    }

    public function getDeleteFoodView(){
        $id = $this->request['id'];
        Food::where(['id' => $id])->delete();
        return redirect(url('admin/manage-food'));
    }

    public function getManageOrderView(){
        $orderList = Order::all();
        $customerList = Customer::all();

        return view('Admin.order.manage-order', [
            'orderList' => $orderList,
            'customerList' => $customerList,
        ]);
    }

    public function getUpdateOrderView(){

        if(isset($this->request['submit'])){
            Order::where(['id' => $this->request['id']])->delete();
            $order = new Order();
            $order->customer_id = $this->request['customer_id'];
            $order->total_amount = $this->request['total_amount'];
            $order->order_status = $this->request['status'];
            $order->save();
            return redirect(url('admin/manage-order'));
        }
        
        $id = $this->request['id'];
        $order = Order::where(['id' => $id])->get();
        return view('Admin.order.update-order', [
            'order' => $order[0],
        ]);
    }

    public function getFoodDetailsView(){
        $id = $this->request['id'];
        $orderDetails = OrderDetail::where(['order_id' => $id])->get();
        $foodDetails = Food::all();

        return view('Admin.order.food-details', [
            'orderDetails' => $orderDetails,
            'foodDetails' => $foodDetails,
        ]);
    }

    public function getManageReservationView(){

        $reservationList = Reservation::all();
        $customerList = Customer::all();

        return view('Admin.reservation.manage-reservation', [
            'reservationList' => $reservationList,
            'customerList' => $customerList,
        ]);
    }

    public function getUpdateReservationView(){

        $id = $this->request['id'];

        if(isset($this->request['submit'])){
            $reservation = Reservation::where('id', $id)->update(['status' => $this->request['status']]);
            return redirect(url('admin/manage-reservation'));
        }

        return view('Admin.reservation.update-reservation', [
            'id' => $id,
        ]);
    }
}
