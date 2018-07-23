<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\DoctorRequest;
use App\Doctor;
use App\Http\Controllers\Controller;
use Exception;

class DoctorController extends Controller
{

  public function api_index()
  {
    $doctors = Doctor::all();
    return $doctors;
  }


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

    $doctor = new Doctor();
    $doctor->create($formData);

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

    $doctor = Doctor::findOrFail($id);
    $doctor->update($formData);

    flash('Doctor successfully updated')->success();
    return redirect(route('doctors.edit', ['id' => $id]));
  }

  public function delete($id)
  {
    $doctor = Doctor::findOrFail($id);

    try {
      $doctor->delete();
      flash('Doctor removed successfully')->success();
    } catch (Exception $e) {
      flash('Record can not be deleted because it has related records')->error();
    }

    return redirect(route('doctors.index'));
  }
}
