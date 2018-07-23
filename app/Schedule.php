<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
  protected $fillable = ['name', 'patient_id', 'doctor_id', 'date_time'];

  public function doctor()
  {
    $this->belongsTo(Doctor::class);
  }

  public function patient()
  {
    $this->belongsTo(Patient::class);
  }
}
