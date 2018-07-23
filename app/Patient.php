<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
  protected $fillable = ['name', 'email'];

  public function schedules()
  {
    return $this->hasMany(Schedule::class);
  }
}
