<?php

namespace App\Models;

use App\Traits\Locale;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  use HasFactory, Locale;

  protected $fillable = ['title_uz', 'title_ru', 'title_en', 'title_ar', 'phone', 'email'];
}
