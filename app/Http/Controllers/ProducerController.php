<?php

namespace App\Http\Controllers;

use App\Models\Producer;
use App\Models\User;
use Illuminate\Http\Request;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $data = User::latest()->paginate(50);

        return view('community.producer.index',compact('data', 'user'))
            ->with('i', (request()->input('page', 1) - 1) * 50);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type'      => 'required',
            'name'      => 'required',
            'phone'     => 'required',
            'address'   => 'required',
        ]);

        Producer::create($request->all());
     
        return redirect()->route('producers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function show(Producer $producer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producer = Producer::find($id);
        
        return view('producers.edit', compact('producer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type'      => 'required',
            'name'      => 'required',
            'phone'     => 'required',
            'address'   => 'required',
        ]);

        $producer = Producer::find($id);

        $producer->type     = $request->input('type');
        $producer->name     = $request->input('name');
        $producer->phone    = $request->input('phone');
        $producer->address  = $request->input('address');
        $producer->update();

        return redirect()->route('producers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producer = Producer::find($id);
        $producer->delete();

        return redirect()->route('producers');
    }
}
