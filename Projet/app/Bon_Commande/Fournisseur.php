<?php

namespace App\Bon_Commande;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $fillable = ['MATRICULE_FRS','NOM_FRS','TEL_FRS','estSupprimer'];
}
