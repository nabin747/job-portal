<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'salary',
        'location',
        'category',
        'experience', // Add the 'experience' attribute to the $fillable property
    ];

    public  static $experience = ['entry','intermediate','senior'];
    public  static $category = ['IT','Finance','Sales','Marketing'];
}
