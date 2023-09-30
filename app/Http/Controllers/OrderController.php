<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->orderBy('created_at','desc')->get();
        return view('admin.pages.orders.index',['orders'=>$orders]);
    }

    public function view($id)
    {
        $status = ['Pending','Processing','Shipped','Cancelled'];
        $order = Order::with('user','items','items.product','items.color')->findOrFail($id);
        return view('admin.pages.orders.view',['order'=> $order,'status'=>$status]);
    }

    public function updateStatus($id, Request $request)
    {
        // Order::findOrFail($id)->update
        $order = Order::findOrFail($id);

        // Validate the request data (you can customize the validation rules)
        $request->validate([
            'status' => 'required|in:Pending,Processing,Shipped,Cancelled',
        ]);

        // Update the order status
        $order->status = $request->input('status');
        $order->save();

        // Redirect back to the order view page or any other desired location
        return redirect()->route('  status.update', ['id' => $id])
            ->with('success', 'Order status updated successfully');
    }
    }

