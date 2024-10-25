<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoClaim extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'content_id', 'claim_date'];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Content (atau Video)
    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
