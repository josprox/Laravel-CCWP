<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classmodel extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'classmodels';

    protected $fillable = ['tipo','clase'];
	
}
