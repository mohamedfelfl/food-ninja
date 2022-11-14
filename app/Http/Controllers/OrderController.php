<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Order;
use App\Traits\response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use response;

    public function getAllOrders(Request $request){
        $orders = Order::where('user_id', $request->user()->id)->get();
        return $this->jsonResponseMessage('User orders' , data:  ['orders' => $orders]);

    }

    public function addOrder(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $order = new Order();
        $order->user_id = $request->user()->id;
        $order->name = $request->input('name');
        $order->price = $request->input('price');
        $order->date = $request->input('date');
        $order->image_url = $request->input('image_url');
        if($order->save()){
            return $this->jsonResponseMessage('Order added successfully' , data:  ['order' => $order]);
        }else{
            return $this->jsonResponseMessage("Error with adding order", false);
        }
    }


    public function updateOrderStatus(Request $request): JsonResponse
    {
        $request->validate([
            'id' => 'required|integer',
            'status' => 'required|integer',
        ]);
        $order = Order::where('id', $request->input('id'))->first();
        if(!$order){
            return $this->jsonResponseMessage('Order does not exist', false);
        }
        $order->status = $request->input('status');
        if($order->save()){
            return $this->jsonResponseMessage('Order updated successfully' , data: ['order' => $order]);
        }else{
            return $this->jsonResponseMessage("Error with updating order", false);
        }
    }

    public function getOrders(Request $request): JsonResponse
    {
        $user = $request->user();
        $orders = Order::where('user_id', $user->id);
        if($orders){
            return $this->jsonResponseMessage('Orders are available', data: ['orders' => $orders]);
        }else{
            return $this->jsonResponseMessage('Orders do not exist', false);
        }
    }

}
