<?php

namespace App\Http\Controllers;

use App\Items;
use App\Order;
use App\Branch;
use App\Employee;
use App\Stock;
use App\User;



use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        //return dd($branches->stock());
        return response()->json($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Items  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Items $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Items  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Items $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Items  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Items $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Items  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Items $item)
    {
        //
    }

    public function processItems(Request $request)
    {
        $data = $request;
        $order= Order::where('id', $data['order'])->first();
        $branch= Branch::where('id', $data['branch'])->first();
        
        //$client= User::where('id', $order->client_id)->first();
        $items = $data['items'];

        for($i=0; $i<(sizeof($items)-2); $i++){

            $item = new Item();
            $item->order_id = $items[$i]['order_id'];
            $item->stock_id = Stock::where('branch_id', $branch->id)->where('product_id', $items[$i][0])->pluck('id');
            $item->status = 3;
        }
        return(dd($items));
    }
}
