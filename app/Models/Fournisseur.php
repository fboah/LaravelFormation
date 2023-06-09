<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{

    protected $table = 'fournisseurs';
    protected $primaryKey = 'id';
    protected $fillable = ['Code', 'Libelle', 'Tel', 'Adresse', 'SiteWeb'];


    use HasFactory;
}
