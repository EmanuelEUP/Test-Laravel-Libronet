<?php

namespace libronet;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
  protected $fillable = ['USUARIOS_NOMBRE', 'USUARIOS_EMAIL', 'USUARIOS_PASSWORD' ];

}
