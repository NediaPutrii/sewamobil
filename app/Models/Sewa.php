<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;
    protected $table = 'sewa';

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}
