<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'url_video',
        'price',
        'image', 
        'category',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contentDetails()
    {
        return $this->hasMany(ContentDetail::class);
    }
}
