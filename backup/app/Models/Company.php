<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = [
        "num_asset",
        "date_into",
        "name_asset",
        "detail",
        "unit",
        "place",
        "per_price",
        "status_buy",
        "num_old_asset",
        "fullname",
        "department",
        "other_department",
        "name_info",
        "num_department",
        "budget",
        "cover",
        "code_money_id",
        "name_money_id",
        "budget"
    ];

    public function cash()
    {
        return $this->belongsTo(Cash::class, 'code_money_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function chips()
    {
        return $this->hasMany(Chips::class);
    }
}
