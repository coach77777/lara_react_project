<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'category_name',

    ];

// Eloquent ORM using the model
    public function user()
    {
        return $this->hasOne(User::class, 'id',  'user_id');
    }
}
