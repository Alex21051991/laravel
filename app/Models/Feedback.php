<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property string feedback
 */
class Feedback extends Model
{
    use HasFactory;
    //public $timestamps = true;
    protected  $table = 'feedback';
    protected $fillable = ['name', 'feedback'];
}
