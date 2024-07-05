<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
        protected $table = 'feedbacks';

        protected $fillable = [
            'full_name',
            'feedback_email',
            'feedback_message'
        ];
        
}

