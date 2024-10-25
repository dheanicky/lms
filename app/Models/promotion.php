<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = ['content_id', 'discount_percentage', 'token', 'valid_for_course', 'start_date', 'end_date'];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function isValid($token, $courseId)
    {
        // Cek apakah token valid dan promosi valid untuk kursus tertentu
        return $this->token === $token && $this->valid_for_course && $this->content_id === $courseId;
    }
}
