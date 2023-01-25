@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Add New Product')}}</div>

                <div class="card-body">

                    <form action="{{ route('product.store') }}" method="POST" class="d-flex flex-column">
                        @csrf

                        <div class="form-group">
                            <strong>Product Code</strong>
                            <input type="text" name="product_code" id="product_code" class="form-control" placeholder="Product's Code">
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Name</strong>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Product's Name">
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