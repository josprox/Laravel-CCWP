<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'tickets';

    protected $fillable = ['Usuario','Nombre','num_control','Motivo','Mensaje'];
	
}
