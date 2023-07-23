<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property string email
 * @property string password
 * @property string isAdmin
 */
class Users extends Model
{
    use HasFactory;
    protected  $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'isAdmin',
    ];
}
