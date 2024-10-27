<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RateResearcher extends Model
{

    use HasFactory;

    protected $fillable = [
        'researcher_id',
        'company_id',
        'rate'
    ];

    public function Researcher(): BelongsTo
    {
        return $this->belongsTo(Researcher::class);
    }

    public function Company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}