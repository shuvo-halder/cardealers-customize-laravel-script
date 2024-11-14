<?php

namespace Modules\Currency\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Currency\Database\factories\MultiCurrencyFactory;

class MultiCurrency extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): MultiCurrencyFactory
    {
        
    }
}
