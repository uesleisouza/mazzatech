<?php

namespace App\Http\Controllers\Admin;

use App\Doctor;
use App\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\ScheduleRequest;
use App\Schedule;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
  public function index()
  {
    $schedules = Schedule::all();
    $patients = Patient::all();
    $doctors = Doctor::all();
    return view('admin.schedules.index', compact('schedules', 'patients', 'doctors'));
  }

  public function create()
  {
    $patients = Patient::all(['id', 'name']);
    $doctors = Doctor::all(['id', 'name']);

    return view('admin.schedules.create', compact('patients', 'doctors'));
  }

  public function store(ScheduleRequest $request)
  {
    $formData = $request->all();
    $request->validated();

    $schedule = new Schedule();
    $schedule->create($formData);

    flash('Schedule created successfully')->success();
    return redirect(route('schedules.index'));
  }

  public function edit(Schedule $schedule)
  {
    $patients = Patient::all(['id', 'name']);
    $doctors = Doctor::all(['id', 'name']);

    return view('admin.schedules.edit', compact('schedule', 'patients', 'doctors'));
  }

  public function update(ScheduleRequest $request, $id)
  {
    $formData = $request->all();

    $request->validated();

    $schedule = Schedule::findOrFail($id);
    $schedule->update($formData);

    flash('Schedule successfully updated')->success();
    return redirect(route('schedules.edit', ['id' => $id]));
  }

  public function delete($id)
  {
    $schedule = Schedule::findOrFail($id);
    $schedule->delete();

    flash('Schedule removed successfully')->success();
    return redirect(route('schedules.index'));
  }
}
