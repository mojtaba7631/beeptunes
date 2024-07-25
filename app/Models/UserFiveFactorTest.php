<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFiveFactorTest extends Model
{
    use HasFactory;

    protected $table = 'user_five_factor_tests';
    protected $guarded = [];
}
