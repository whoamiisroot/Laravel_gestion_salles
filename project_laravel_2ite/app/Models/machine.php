<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class machine extends Model
{
    protected $fillable = ['id', 'reference', 'marque','dateAchat','prix','salleid'];
    use HasFactory;
}
