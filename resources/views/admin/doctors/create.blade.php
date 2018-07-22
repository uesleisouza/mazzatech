@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h1>Create Doctor</h1>

                <form action="{{route('doctors.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" value="{{old('name')}}">
                        @if($errors->has('name'))
                            <span class="invalid-feedback">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>CRM:</label>
                        <input type="text" name="crm" class="form-control @if($errors->has('crm')) is-invalid @endif" value="{{old('crm')}}">
                        @if($errors->has('crm'))
                            <span class="invalid-feedback">{{$errors->first('crm')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{route('doctors.index')}}" class="btn btn-outline-primary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
