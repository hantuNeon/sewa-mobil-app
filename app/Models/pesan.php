<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesan extends Model
{
    use HasFactory;
    protected $table = 'pesan';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
