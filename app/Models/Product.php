<?php

namespace App\Models;

use App\Models\Catergory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public function catergory()
    {
        return $this->belongsTo(Catergory::class);
    }
}
