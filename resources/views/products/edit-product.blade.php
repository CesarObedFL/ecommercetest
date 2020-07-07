@extends('layouts.template')

@section('title', 'edit product')

@section('content')

@include('partials.errors')

<div class="container">
	<div class="row justify-content-center"><h4><strong>Edit Product</strong></h4></div><hr>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<form role="form" action="{{ route('products.update',$product->id) }}" method="POST">
				{{ csrf_field() }}
				<div class="box-body">
					<input name="_method" type="hidden" value="PUT">
					<div class="form-group">
						<label for="name">Name: {{ $product->name }}</label>
						<input v-model="name" class="form-control" type="text" name="name" id="name" placeholder="enter the new name...">
					</div>
					<div class="form-group">
						<label for="description">Description:</label>
						<textarea class="form-control" name="description" id="description">{{ $product->description }}</textarea>
					</div>
					<div class="form-group">
						<label for="price">Price:</label>
						<input class="form-control" type="text" name="price" id="price" value="{{ $product->price }}">
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary btn-block"> Save </button>
					<a class="btn btn-danger btn-block" href="{{ route('products.show', $product->slug) }}"> Cancel </a>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
