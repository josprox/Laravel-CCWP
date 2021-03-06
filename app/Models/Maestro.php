<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'maestros';

    protected $fillable = ['usuario','correo','img','nombre','discapacidad'];
	
}
