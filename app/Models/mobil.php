<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
    use HasFactory;
    protected $table = 'mobil';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
