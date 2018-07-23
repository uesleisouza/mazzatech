<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
  protected $fillable = ['name', 'crm'];

  public function schedules()
  {
    return $this->hasMany(Schedule::class);
  }
}
