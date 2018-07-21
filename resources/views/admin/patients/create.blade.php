@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h1>Create Patient</h1>

                <form action="{{route('patients.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" value="{{old('name')}}">
                        @if($errors->has('name'))
                            <span class="invalid-feedback">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email address:</label>
                        <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" value="{{old('email')}}">
                        @if($errors->has('email'))
                            <span class="invalid-feedback">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
