<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_info extends Model
{
    use HasFactory;
    protected  $table = 'order_info';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'info',
    ];
}
