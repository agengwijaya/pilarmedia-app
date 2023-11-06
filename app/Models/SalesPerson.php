<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesPerson extends Model
{
    use HasFactory;

    protected $table = 'sales_people';

    protected $guarded = ['id'];

    public function sales()
    {
        return $this->hasMany(Sales::class);
    }
}
