@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Users</h1>
            </div>
            <div class="col-6 text-right">
                <a href="{{route('users.create')}}" class="btn btn-success">New</a>
            </div>
            <div class="col-12">
                <table class="table table-striped table-bordered" id="data_table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $u)
                        <tr>
                            <td scope="row">{{$u->id}}</td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td>
                                <a href="{{route('users.edit', ['id' => $u->id])}}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{route('users.delete', ['id' => $u->id])}}" class="btn btn-danger btn-sm">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
