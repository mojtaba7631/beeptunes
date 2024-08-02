<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackAlbum extends Model
{
    use HasFactory;
    protected $table = 'track_albums';
    protected $guarded = [];
}
