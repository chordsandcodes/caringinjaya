@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Edit ')}}({{ $product->name }})</div>

                <div class="card-body">

                    <form action="{{ route('supplier.update', $product->id) }}" method="POST" class="d-flex flex-column">

                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <strong>Product Code</strong>
                            <input type="text" name="product_code" id="product_code" value="{{ $product->product_code }}" class="form-control" placeholder="Product Code">
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Product Name</strong>
                            <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control" placeholder="Product's Name">
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Address</strong>
                            <textarea name="address" id="address" class="form-control" placeholder="Supplier's Address">{{ $product->address }}</textarea>
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