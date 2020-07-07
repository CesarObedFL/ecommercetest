@extends('layouts.template')

@section('title', 'users')

@section('content')

@include('partials.success')
@include('partials.delete')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    USERS
                    <a class="btn btn-success btn-sm" href="{{ route('users.create') }}"> CREATE NEW USER </a>
                </div>

                <div class="card-body">

                    @if($users->isEmpty())
                        <div class="col-md-8">
                            <div class="alert alert-warning">
                                <i class="icon fa fa-warning"> </i> There isn't users registered...
                            </div>
                        </div>
                    @else
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="success">
                                    <th> ID </th>
                                    <th> Name </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td><a class="btn btn-sm btn-block btn-info" href="{{ route( 'users.show', $user->name ) }}">{{ $user->id }}</a></td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
