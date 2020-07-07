@extends('layouts.template')

@section('title', 'details of user')

@section('content')

@include('partials.edit')

<div class="container">
	<div class="row justify-content-center"><h4><strong>Details of the User</strong></h4></div><hr>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<dl class="dl-horizontal">
				<dt>Name:</dt><dd>{{ $user->name }}</dd>
				<dt>Email:</dt><dd>{{ $user->email }}</dd>
				<dt>Password:</dt><dd>{{ $user->password }}</dd>
			</dl>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-2">
        	<a class="btn btn-primary btn-block" href="{{ route('users.index') }}"> Return </a>
    	</div>
        <div class="col-md-2">
        	<a class="btn btn-success btn-block" href="{{ route('users.edit', $user->id) }}"> Edit </a>
    	</div>
        <div class="col-md-2">
	        <form role="form" action="{{ route('users.destroy', $user->id) }}" method="POST">
	        	{{ csrf_field() }}
	        	<input type="hidden" name="_method" value="DELETE">
	        	<button type="submit" class="btn btn-danger btn-block"> Delete
	        		<i class="icon fa fa-trash"></i>
	        	</button>
	        </form>
    	</div>
	</div>
</div>
@endsection
