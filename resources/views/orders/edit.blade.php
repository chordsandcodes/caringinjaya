@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Edit Order')}}</div>

                <div class="card-body">

                    <form action="{{ route('order.update', $order->id) }}" method="POST" class="d-flex flex-column">

                        @csrf
                        @method('PUT')
                        
                        <input type="text" name="from" id="from" value={{ $distributor_id }} class="form-control d-none" disabled>
                        <input type="text" name="to" id="to" value={{ $producer_id }} class="form-control d-none" disabled>
                        <div class="form-group">    
                            <strong>Product</strong>
                            @if ($user->type == "distributor")
                                <select name="product" id="product" class="form-select" aria-label="Default select product">
                                    <option hidden>Selected Product</option>
                                    @if ($order->product == "bonteng")
                                        <option value="bonteng" selected>Bonteng</option>
                                        <option value="terong">Terong</option>
                                        <option value="bawang">Bawang</option>
                                    @elseif ($order->product == "terong")
                                        <option value="bonteng">Bonteng</option>
                                        <option value="terong" selected>Terong</option>
                                        <option value="bawang">Bawang</option>
                                    @elseif ($order->product == "bawang")
                                        <option value="bonteng">Bonteng</option>
                                        <option value="terong">Terong</option>
                                        <option value="bawang" selected>Bawang</option>
                                    @endif
                                </select>
                            @elseif ($user->type == "producer")
                                <select name="product" id="product" class="form-select" aria-label="Default select product" disabled>
                                    <option hidden>Selected Product</option>
                                    @if ($order->product == "bonteng")
                                        <option value="bonteng" selected>Bonteng</option>
                                        <option value="terong">Terong</option>
                                        <option value="bawang">Bawang</option>
                                    @elseif ($order->product == "terong")
                                        <option value="bonteng">Bonteng</option>
                                        <option value="terong" selected>Terong</option>
                                        <option value="bawang">Bawang</option>
                                    @elseif ($order->product == "bawang")
                                        <option value="bonteng">Bonteng</option>
                                        <option value="terong">Terong</option>
                                        <option value="bawang" selected>Bawang</option>
                                    @endif
                                </select>
                            @endif
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Product Quantity</strong>
                            <input type="text" name="qty" id="qty" value={{ $qty }} class="form-control" placeholder="How much of this product do you need?">
                        </div>
                        <br>
                        @if ($user->type == "producer")
                            <div class="form-group">
                                <strong>Total Price</strong>
                                <input type="text" name="total_price" id="total_price" class="form-control" placeholder="Total Price">
                            </div>
                        @elseif ($user->type == "distributor")
                            <input type="text" name="total_price" id="total_price" class="form-control d-none" placeholder="Total Price">
                        @endif
                        <br>
                        @if ($user->type == "producer")
                        <div class="form-group">
                            <select name="status" id="status" class="form-select" aria-label="Default select status">
                                <option hidden>Order Status</option>
                                <option value="pending" selected>Pending</option>
                                <option value="accepted">Accepted</option>
                                <option value="declined">Bawang</option>
                                <option value="success">Bawang</option>
                            </select>
                        </div>
                        <br>
                        @endif
                        <button type="submit button" class="btn btn-primary"><i class="fa-sharp fa-solid fa-floppy-disk"></i></button>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection