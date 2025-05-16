<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class UserAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'house_no_encrypted',
        'village_no_encrypted',
        'subdistrict_encrypted',
        'district_encrypted',
        'province_encrypted',
        'id_card_encrypted',
        'registered_count'
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
