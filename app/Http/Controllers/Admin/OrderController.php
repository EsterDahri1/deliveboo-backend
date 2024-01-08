<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Auth::user()->restaurant->orders;
        return view("admin.orders.index", compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ricordarsi di autorizzare la richiesta dallo store order request
        $validated = $request->validate([
            'costumer' => 'required|max:50|min:2',
            'costumerAddress' => 'required|max:1000|min:2',
            'phoneNumber' => 'required|numeric',
            'email' => 'nullable|max:50|min:2',
            'restaurant_id' => 'required|numeric',
        ]);
        $order = new Order();

        $order->costumer = $request->costumer;
        $order->costumerAddress = $request->costumerAddress;
        $order->phoneNumber = $request->phoneNumber;
        $order->email = $request->products_quantity;
        $order->restaurant_id = $request->restaurant_id;
        $order->order_number = $request->products_name;
        $order->orderDate = Carbon::now()->format('Y-m-d');
        $order->deliveryDate = Carbon::now()->format('Y-m-d');
        $order->statusOrder = 1;
        $order->totalPrice = $request->totalPrice;


        $order->save();

        return response()->json([
            'success' => true,
            'order' => $order,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // $products= $order->products;

        // dd($products);
        return view("admin.orders.show", compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index')->with('messaggio', 'hai cancellato il piatto con successo!');
    }
}
