@extends('layouts.template')

@section('title', 'details of product')

@section('content')

@include('partials.edit')

<div class="container">
	<div class="row justify-content-center"><h4><strong>Details of the Product</strong></h4></div><hr>
	<div class="row justify-content-center">
		<div class="col-md-6">
			<img src="{{ $product->getMedia('images')->first()->getUrl('product-image') }}" class="img-rounded">
		</div>
		<div class="col-md-6">
			<dl class="dl-horizontal">
				<dt>Name:</dt><dd>{{ $product->name }}</dd>
				<dt>Slug:</dt><dd>{{ $product->slug }}</dd>
				<dt>Description:</dt><dd>{{ $product->description }}</dd>
				<dt>Price:</dt><dd>{{ $product->price }}</dd>
				<dt>Status:</dt><dd>{{ $product->status }}</dd>
			</dl>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-2">
        	<a class="btn btn-primary btn-block" href="{{ route('home') }}"> Return </a>
    	</div>
    	@if(Auth::check())
	        <div class="col-md-2">
	        	<a class="btn btn-success btn-block" href="{{ route('products.edit', $product->slug) }}"> Edit </a>
	    	</div>
	        <div class="col-md-2">
		        <form role="form" action="{{ route('products.destroy', $product->id) }}" method="POST">
		        	{{ csrf_field() }}
		        	<input type="hidden" name="_method" value="DELETE">
		        	<button type="submit" class="btn btn-danger btn-block"> Delete
		        		<i class="icon fa fa-trash"></i>
		        	</button>
		        </form>
	    	</div>
    	@endif
	</div>
</div>
@endsection
