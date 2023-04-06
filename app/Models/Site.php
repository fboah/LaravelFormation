<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'sites';
    protected $primaryKey = 'id';
    protected $fillable = ['Libelle', 'IdVille'];


    use HasFactory;
}