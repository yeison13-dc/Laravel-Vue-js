<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [ 'nombres', 'apellidos','cedula', 'email', 'sexo','telefono'];
}
