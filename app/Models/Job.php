<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory;
    use SoftDeletes; 

    protected $fillable = [
        'employer_id',
        'title',
        'description',
        'location',
        'salary_range',
        'employment_type',
        'status',
        'posted_at',
        'expires_at',
    ];

    public function employer()
    {
        return $this->belongsTo(User::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeAvaliable($query)
    {
        $query->where('status', '=', 'open');
    }

}
