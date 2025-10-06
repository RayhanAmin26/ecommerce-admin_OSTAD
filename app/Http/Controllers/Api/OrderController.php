<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index() {
        return Order::all();
    }

    public function store(Request $request) {
        $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'total_price' => 'required|numeric',
        ]);
        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    public function show(Order $order) {
        return $order;
    }

    public function update(Request $request, Order $order) {
        $order->update($request->all());
        return response()->json($order, 200);
    }

    public function destroy(Order $order) {
        $order->delete();
        return response()->json(null, 204);
    }
}
