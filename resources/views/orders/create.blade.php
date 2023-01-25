@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Create New Order')}}</div>

                <div class="card-body">

                    <form action="{{ route('order.store') }}" method="POST" class="d-flex flex-column">
                        @csrf

                        <div class="form-group">
                            <input type="text" name="from" id="from" value="{{ $user->id }}" class="form-control" hidden>
                            <select name="to" id="to" class="form-select" aria-label="Default select to">
                                <option hidden>Pick a Producer</option>
                                @foreach ($producer as $key => $value)
                                    <option value={{ $value->id }}>{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <select name="product" id="product" class="form-select" aria-label="Default select product">
                                <option hidden>Pick a Product</option>
                                <option value="bonteng">Bonteng</option>
                                <option value="terong">Terong</option>
                                <option value="bawang">Bawang</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Product Quantity</strong>
                            <input type="text" name="qty" id="qty" class="form-control" placeholder="Quantity">
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