<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Descriptions extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'production_id',

    ];
    public function production(): BelongsTo
    {
        return $this->belongsTo(Production::class);
    }
}
