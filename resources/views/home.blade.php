@extends('layouts.template')

@section('title', 'home')

@section('content')

@include('partials.success')
@include('partials.delete')
@include('partials.errors')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if($products->isEmpty())
                <div class="col-md-8">
                    <div class="alert alert-warning">
                        <i class="icon fa fa-warning"> </i> There isn't products registered...
                    </div>
                </div>
            @else
                <div class="container-fluid">
                    <div class="card-group">
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top img-rounded img-fluid mx-auto" src="{{ $product->getMedia('images')->first()->getUrl('product-image') }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">Price : ${{ $product->price }}</p>
                                    <a class="btn btn-primary btn-block" href="{{ route('products.show', $product->slug) }}">Details</a>
                                    <a class="btn btn-success btn-block" href="{{ route('cart.add', $product->id) }}">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <br>
                    <div>
                        {{ $products->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
