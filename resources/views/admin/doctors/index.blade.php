@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Doctors</h1>
            </div>
            <div class="col-6 text-right">
                {{--<a href="{{route('doctors.create')}}" class="btn btn-success">New</a>--}}
            </div>
            <div class="col-12">
                <table class="table table-striped table-bordered" id="data_table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">CRM</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($doctors as $p)
                        <tr>
                            <td scope="row">{{$p->id}}</td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->crm}}</td>
                            <td>
                                <a href="{{route('doctors.edit', ['id' => $p->id])}}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{route('doctors.delete', ['id' => $p->id])}}" class="btn btn-danger btn-sm">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
