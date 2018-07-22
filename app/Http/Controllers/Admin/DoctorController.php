<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\DoctorRequest;
use App\Doctor;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
  public function index()
  {
    $doctors = Doctor::all();
    return view('admin.doctors.index', compact('doctors'));
  }

  public function create()
  {
    return view('admin.doctors.create');
  }

  public function store(DoctorRequest $request)
  {
    $formData = $request->all();

    $request->validated();

    $patient = new Doctor();
    $patient->create($formData);

    flash('Doctor created successfully')->success();
    return redirect(route('doctors.index'));
  }

  public function edit(Doctor $doctor)
  {
    return view('admin.doctors.edit', compact('doctor'));
  }

  public function update(DoctorRequest $request, $id)
  {
    $formData = $request->all();

    $request->validated();

    $patient = Doctor::findOrFail($id);
    $patient->update($formData);

    flash('Doctor successfully updated')->success();
    return redirect(route('doctors.edit', ['id' => $id]));
  }

  public function delete($id)
  {
    $patient = Doctor::findOrFail($id);
    $patient->delete();

    flash('Doctor removed successfully')->success();
    return redirect(route('doctors.index'));
  }
}
