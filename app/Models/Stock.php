<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    //protected $table = 'sites';
    protected $primaryKey = 'id';
    protected $fillable = ['NomArticle', 'StockTotal'];


    use HasFactory;
}
