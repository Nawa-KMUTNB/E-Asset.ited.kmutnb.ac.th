<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chips extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_money',
        'name_money',
        'budget',
        'companies_id',
        'otherCode',
        'otherMoney',
        'otherBudget',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
