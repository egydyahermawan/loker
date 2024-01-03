<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
  use HasFactory;

  protected $fillable = ['title', 'description', 'slot', 'open', 'closed', 'status', 'image', 'id_perusahaan'];

  public function perusahaan()
  {
    return $this->belongsTo('App\Models\User', 'id_perusahaan', 'id');
  }
}
