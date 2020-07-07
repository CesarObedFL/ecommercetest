@extends('layouts.template')

@section('title', 'create product')

@section('content')

@include('partials.errors')

<div class="container">
	<div class="row justify-content-center"><h4><strong>Create Product</strong></h4></div><hr>
	<div class="row justify-content-center">
		<div class="col-md-8" id="product-form">
			<form role="form" class="form-horizontal" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="box-body">
					<div class="form-group">
						<label for="name">Name: </label>
						<input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" required>
					</div>
					<div class="form-group">
						<label for="description">Description:</label>
						<textarea class="form-control" name="description" id="description" required>{{ old('description') }}</textarea>
					</div>
					<div class="form-group">
						<label for="price">Price:</label>
						<input class="form-control" type="text" name="price" id="price" value="{{ old('price') }}" required>
					</div>
					<div class="form-group">
						<label for="image">Image:</label>
						<input class="form-control" accept="image/*" type="file" name="image" id="image">
					</div>
				</div>
				<div class="panel-footer">
					<button type="submit" class="btn btn-primary btn-block"> Save </button>
					<a class="btn btn-danger btn-block" href="{{ route('home') }}"> Cancel </a>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection