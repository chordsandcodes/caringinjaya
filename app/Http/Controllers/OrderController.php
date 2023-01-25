<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;    
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->type =="distributor") {
            $data = Order::latest()->where('from', '=', $user->id)->paginate(50);
        } elseif ($user->type =="producer") {
            $data = Order::latest()->where('to', '=', $user->id)->paginate(50);
        }

        if (count($data) == 0) {
            $producer_name = '-';
            $distributor_name = '-';
            return view('orders.index', compact('user', 'data', 'producer_name', 'distributor_name'))
            ->with('i', (request()->input('page', 1) - 1) * 50);
        } elseif (count($data) >= 1) {
            $producer_id    = $data[0]->to;
            $distributor_id    = $data[0]->from;
            $distributor_name  = User::find($distributor_id)->name;
            $producer_name  = User::find($producer_id)->name;
            return view('orders.index', compact('user', 'data', 'producer_name', 'distributor_name'))
            ->with('i', (request()->input('page', 1) - 1) * 50);
        }
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function incoming()
    {
        $user = auth()->user();
        $data = Order::latest()->where('to', '=', $user->id)->paginate(50);
        // dd($data);

        if (count($data) == 0) {
            $distributor_name = '-';
            return view('orders.incoming', compact('user', 'data', 'distributor_name'))
            ->with('i', (request()->input('page', 1) - 1) * 50);
        } elseif (count($data) >= 1) {
            $distributor_id    = $data[0]->from;
            $distributor_name  = User::find($distributor_id)->name;
            return view('orders.incoming', compact('user', 'data', 'distributor_name'))
            ->with('i', (request()->input('page', 1) - 1) * 50);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user           = auth()->user();
        $producer       = User::all()->where('type', '=', 'producer');
        // dd($producer);
        return view('orders.create', compact('user', 'producer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        // dd($request);

        $request->validate([
            'to'            => 'required',
            'product'       => 'required',
            'qty'           => 'required',
        ]);

        Order::create($request->all());
     
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user               = auth()->user();
        $order              = Order::find($id);
        $producer_id        = $order->to;
        $distributor_id     = $order->from;
        $distributor_name   = User::find($distributor_id)->name;
        $qty                = $order->qty;
        // dd($order);
        
        return view('orders.edit', compact('order', 'user', 'distributor_id', 'producer_id', 'distributor_name', 'qty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function accept($id)
    {
        $user = auth()->user();
        $order = Order::find($id);
        // dd($order);
        
        return view('orders.accept', compact('order', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->route('orders');
    }
}
