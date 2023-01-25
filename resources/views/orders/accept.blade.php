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
                        
                        <div class="form-group">
                            <strong>Product</strong>
                            <input type="text" name="product" id="product" value="{{ $order->product }}" class="form-control" placeholder="Product">
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Product Name</strong>
                            <input type="text" name="name" id="name" value="{{ $order->from }}" class="form-control" placeholder="Product's Name">
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Address</strong>
                            <textarea name="address" id="address" class="form-control" placeholder="Supplier's Address">{{ $order->from }}</textarea>
                        </div>
                        <br>
                        <button type="submit button" class="btn btn-primary"><i class="fa-sharp fa-solid fa-floppy-disk"></i></button>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection