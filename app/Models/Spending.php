<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Spending extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'type',
        'bugget',
        'actual_spent',
        'percentage',
        'next_year_budget',
        'file_path',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
    
    public $incrementing = false;
    protected $keyType = 'string';
}
