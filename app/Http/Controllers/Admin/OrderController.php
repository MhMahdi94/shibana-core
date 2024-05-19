<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders=Order::paginate(10);
        $total_price=Order::sum('price');
        $vat=Order::sum('price');
        $totalAmount=$total_price + $vat;
        $total_order=Order::count();
        $day_order= Order::whereDay('created_at', now()->day)->count();
        $day_amount= Order::whereDay('created_at', now()->day)->sum('price');
        $day_vat= Order::whereDay('created_at', now()->day)->sum('vat');
        $day_total=$day_amount+$day_vat;
        return view('admin.orders.index', compact('orders','totalAmount','total_order','day_order', 'day_total'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
