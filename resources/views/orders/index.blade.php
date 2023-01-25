@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">

                <div class="card-header">{{ __('Orders') }}</div>

                <div class="card-body">

                    <div class="container">
                        <!-- {{count($data)}} -->
                        <div class="row d-flex justify-content-between">
                            <div class="col"><b>No</b></div>
                            @if ($user->type == "distributor")
                                <div class="col"><b>To</b></div>
                            @elseif ($user->type == "producer")
                                <div class="col"><b>From</b></div>
                            @endif
                            <div class="col"><b>Product</b></div>
                            <div class="col"><b>Quantity</b></div>
                            <div class="col"><b>Total Price</b></div>
                            <div class="col"><b>Status</b></div>
                            <div class="col"><b>Options</b></div>
                        </div>
                        @foreach ($data as $key => $value)
                        <br>
                        <div class="row">
                            <div class="col align-self-center">{{ ($i++)+1 }}</div>
                            @if ($user->type == "distributor")
                                <div class="col align-self-center">{{ $producer_name }}</div>
                            @elseif ($user->type == "producer")
                                <div class="col align-self-center">{{ $distributor_name }}</div>
                            @endif
                            <div class="col align-self-center">{{ $value->product }}</div>
                            <div class="col align-self-center">{{ $value->qty }}</div>
                            <div class="col align-self-center">{{ $value->total_price }}</div>
                            <div class="col align-self-center">{{ $value->status }}</div>
                            <div class="col align-self-center">
                                <form action="{{ route('order.destroy', $value->id) }}" method="POST">
                                    @if ($value->status == 'pending')  
                                        <a class="btn btn-primary" href="{{ route('order.edit', $value->id) }}"><i class="fa-sharp fa-solid fa-pen"></i></a>   
                                    @else
                                        <a class="btn btn-primary disabled" href="{{ route('order.edit', $value->id) }}"><i class="fa-sharp fa-solid fa-pen"></i></a>
                                    @endif 
                                    @csrf
                                    @method('DELETE')
                                    @if ($value->status == 'pending')       
                                        <button type="submit" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                    @else
                                        <button type="submit" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                    @endif
                                </form>
                            </div>
                        </div>
                        @endforeach
                        <br>
                        <div class="row">
                            <div class="col d-flex flex-column">
                                <a href="{{ route('order.create') }}" class="btn btn-primary"><i class="fa-sharp fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    {!! $data->links() !!} 
                    <br>


                </div>

            </div>
        </div>
    </div>
</div>
@endsection