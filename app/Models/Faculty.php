<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
  use HasFactory;

  protected $fillable = ['type', 'name', 'abbr', 'content'];

  public function getStatusText(): string
  {
    $status = '';

    switch ($this->type) {
      case 0:
        $status = 'Kunduzgi';
        break;
      case 1:
        $status = 'Kechki';
        break;
    }

    return $status;
  }
}
