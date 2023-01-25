@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Products') }}</div>

                <div class="card-body">

                    <div class="container">
                        <div class="row d-flex justify-content-between">
                            <div class="col"><b>No</b></div>
                            <div class="col"><b>Name</b></div>
                            <div class="col"><b>Options</b></div>
                        </div>
                        @foreach ($data as $key => $value)
                        <br>
                        <div class="row">
                            <div class="col align-self-center">{{ ($i++)+1 }}</div>
                            <div class="col align-self-center">{{ $value->name }}</div>
                            <div class="col align-self-center">
                                <form action="{{ route('product.destroy', $value->id) }}" method="POST">  
                                    <a class="btn btn-primary" href="{{ route('product.edit', $value->id) }}"><i class="fa-sharp fa-solid fa-pen"></i></a>   
                                    @csrf
                                    @method('DELETE')      
                                    <button type="submit" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                        <br>
                        <div class="row">
                            <div class="col d-flex flex-column">
                                <a href="{{ route('product.create') }}" class="btn btn-primary"><i class="fa-sharp fa-solid fa-plus"></i></a>
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