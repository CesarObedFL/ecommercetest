@extends('layouts.template')

@section('title', 'edit user')

@section('content')

@include('partials.errors')

<div class="container">
	<div class="row justify-content-center"><h4><strong>Edit User</strong></h4></div><hr>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<form role="form" action="{{ route('users.update',$user->id) }}" method="POST">
				{{ csrf_field() }}
				<div class="box-body">
					<input name="_method" type="hidden" value="PUT">
					<div class="form-group">
						<label for="name">Name: </label>
						<input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}">
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input class="form-control" type="password" name="password" id="password" value="{{ $user->password }}">
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary btn-block"> Save </button>
					<a class="btn btn-danger btn-block" href="{{ route('users.show', $user->name) }}"> Cancel </a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
