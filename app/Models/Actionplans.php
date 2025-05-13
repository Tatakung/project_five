<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Actionplans extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'type',
        'target_a',
        'budget_a',
        'target_b',
        'budget_b',
        'target_c',
        'budget_c',
        'target_d',
        'budget_d',
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
