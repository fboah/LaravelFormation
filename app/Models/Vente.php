<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    protected $table = 'ventes';
    protected $primaryKey = 'id';
    protected $fillable = ['IdLivre', 'NumFacture', 'Quantite', 'DateVente', 'IdSite'];


    use HasFactory;
}
