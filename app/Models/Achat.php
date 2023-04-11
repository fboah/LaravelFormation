<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{

    protected $table = 'achats';
    protected $primaryKey = 'id';
    protected $fillable = ['IdFournisseur', 'IdLivre', 'NumFacture', 'Quantite', 'DateAchat', 'IdSite'];


    use HasFactory;
}
