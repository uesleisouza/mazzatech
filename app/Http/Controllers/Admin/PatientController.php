<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RestauranteRequest;
use App\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
  public function index()
  {
    $patients = Patient::all();
    return view('admin.patients.index', compact('patients'));
  }

  public function create()
  {
    return view('admin.patients.create');
  }

  public function store(RestauranteRequest $request)
  {
    $formData = $request->all();

    $request->validated();

    $patient = new Patient();
    $patient->create($formData);

    print('Patient created successfully');
  }

  public function edit(Patient $patient)
  {
    return view('admin.patients.edit', compact('patient'));
  }

  public function update(RestauranteRequest $request, $id)
  {
    $formData = $request->all();

    $request->validated();

    $patient = Patient::findOrFail($id);
    $patient->update($formData);

    print('Patient successfully updated');
  }

  public function delete($id)
  {
    $patient = Patient::findOrFail($id);
    $patient->delete();

    print('Patient removed successfully');
  }
}
