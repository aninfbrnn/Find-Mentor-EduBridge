<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['mentor_id', 'quantity'];

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }
}
