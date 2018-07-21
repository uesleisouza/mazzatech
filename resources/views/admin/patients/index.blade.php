@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Patients</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($patients as $p)
                        <tr>
                            <th scope="row">{{$p->id}}</th>
                            <td>{{$p->name}}</td>
                            <td>{{$p->email}}</td>
                            <td>
                                <a href="{{route('patients.edit', ['id' => $p->id])}}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{route('patients.delete', ['id' => $p->id])}}" class="btn btn-danger btn-sm">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
