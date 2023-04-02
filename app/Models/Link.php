<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    protected $fillable = ['url','url_shorted','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
