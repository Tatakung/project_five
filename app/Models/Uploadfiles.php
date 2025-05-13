<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Uploadfiles extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'file_path',
        'type_file' , 
        'file_size' , 
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
