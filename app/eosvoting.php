<?php

namespace eosvoting;

use Illuminate\Database\Eloquent\Model;

class eosvoting extends Model
{
  protected $hidden = [
      'created_at', 'updated_at',
  ];
}
