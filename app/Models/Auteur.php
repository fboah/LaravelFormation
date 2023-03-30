<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{

    protected $table = 'auteurs';
    protected $primaryKey = 'id';
    protected $fillable = ['Nom', 'Prenom', 'DateNaissance', 'Telephone', 'Email', 'Genre', 'Image'];


    use HasFactory;
}
