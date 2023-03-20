<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bring extends Model
{
    use HasFactory;

    protected $table = 'brings';
    protected $fillable = [
        "fullname",
        "date_bring",
        "detail",
        "num_asset",
        "name_asset",
        "per_price",
        "num_sent",
        "date_into",
        "department",
        "other_department",
        "num_department",
        "place"
    ];
}
