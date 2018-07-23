@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit User</h1>

                <form action="{{route('users.update', ['id' => $user->id])}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" value="{{$user->name}}">
                        @if($errors->has('name'))
                            <span class="invalid-feedback">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email address:</label>
                        <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" value="{{$user->email}}">
                        @if($errors->has('email'))
                            <span class="invalid-feedback">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif">
                        @if($errors->has('password'))
                            <span class="invalid-feedback">{{$errors->first('password')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Confirm Password:</label>
                        <input type="password" name="confirm_password" class="form-control @if($errors->has('confirm_password')) is-invalid @endif">
                        @if($errors->has('confirm_password'))
                            <span class="invalid-feedback">{{$errors->first('confirm_password')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{route('users.index')}}" class="btn btn-outline-primary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
