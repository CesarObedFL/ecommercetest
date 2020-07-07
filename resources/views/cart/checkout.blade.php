@extends('layouts.template')

@section('title', 'cart-checkout')

@section('content')

@include('partials.edit')
@include('partials.delete')

<div id="app">
   	<cart-component></cart-component>
</div>

<br><br>
<div class="d-flex justify-content-center">
	<a href="{{ route('home') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
</div>

<br><br>

<div class="container">
	<form role="form" class="form-horizontal">
	<div class="row content-justify-center">
		<div class="col-md-6">
			<div class="justify-content-center"><h4>Billing Information</h4></div><hr>
			<div>
				<div class="form-group">
					<label for="name">Name:</label>
					<input class="form-control" type="text" name="name" id="name">
				</div>
				<div class="form-group">
					<label for="address">Address:</label>
					<input class="form-control" type="text" name="address" id="address">
				</div>
				<div class="form-group">
					<label for="country">Country:</label>
					<select class="custom-select d-block w-100" name="country" id="country">
                  		<option value="">Choose country...</option>
                  		<option>United States</option>
                  		<option>Mexico</option>
                  		<option>Canada</option>
                	</select>
				</div>
				<div class="form-group">
					<label for="state">State:</label>
					<select class="custom-select d-block w-100" name="country" id="country">
                  		<option value="">Choose state...</option>
                  		<option>California</option>
                  		<option>Jalisco</option>
                  		<option>Toronto</option>
                	</select>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="justify-content-center"><h4>Payment Information</h4></div><hr>
			<div>
				<div class="form-group">
					<label for="creditCardNumber">Credit Card Number:</label>
					<input class="form-control" type="text" name="creditCardNumber" id="creditCardNumber">
				</div>
				<div class="form-group">
					<label for="expirationDate">Expiration date (Month and Year):</label>
					<input class="form-control" type="text" name="expirationDate" id="expirationDate">
				</div>
					<label for="verificationNumber">CVV (Verification Number):</label>
					<input class="form-control" type="text" name="verificaionNumber" id="verificationNumber">
				</div>
				<hr class="mb-4">
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block"> Pay </button>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>

@endsection