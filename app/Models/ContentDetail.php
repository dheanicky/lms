<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentDetail extends Model
{
    use HasFactory;

    protected $fillable = ['content_id', 'name', 'description'];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function videos()
    {
        return $this->belongsToMany(Video::class, 'video_content_details')
                    ->withPivot('watched')
                    ->withTimestamps();
    }
}
