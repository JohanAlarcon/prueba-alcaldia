<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'email', 'telefono', 'departamento_id'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
