<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Production extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
    ];
    public function description(): HasMany
    {
        return $this->hasMany(Descriptions::class);
    }
}
