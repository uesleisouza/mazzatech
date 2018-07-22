@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit Doctor</h1>

                <form action="{{route('doctors.update', ['id' => $doctor->id])}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" placeholder="" value="{{$doctor->name}}">
                        @if($errors->has('name'))
                            <span class="invalid-feedback">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>CRM:</label>
                        <input type="text" name="crm" class="form-control @if($errors->has('crm')) is-invalid @endif" placeholder="" value="{{$doctor->crm}}">
                        @if($errors->has('crm'))
                            <span class="invalid-feedback">{{$errors->first('crm')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{route('doctors.index')}}" class="btn btn-outline-primary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
