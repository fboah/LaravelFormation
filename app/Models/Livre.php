<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    protected $table = 'livres';
    protected $primaryKey = 'id';
    protected $fillable = ['Titre', 'IdCategorie', 'DateParution'];

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);

       // return $this->belongsTo('categorie');
    }

   // use HasFactory;
}
