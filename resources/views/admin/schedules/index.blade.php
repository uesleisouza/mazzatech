@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Schedules</h1>
            </div>
            <div class="col-6 text-right">
                <a href="{{route('schedules.create')}}" class="btn btn-success">New</a>
            </div>
            <div class="col-12">
                <table class="table table-striped table-bordered" id="data_table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Patient</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Date/Time</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schedules as $s)
                        <tr>
                            <td scope="row">{{$s->id}}</td>
                            <td>{{$s->name}}</td>
                            <td>{{$patients->find($s->patient_id)->name}}</td>
                            <td>{{$doctors->find($s->doctor_id)->name}}</td>
                            <td>{{$s->date_time}}</td>
                            <td>
                                <a href="{{route('schedules.edit', ['id' => $s->id])}}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{route('schedules.delete', ['id' => $s->id])}}" class="btn btn-danger btn-sm">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
