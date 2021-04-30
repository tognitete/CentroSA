<?php

namespace App\Bon_Commande;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable = ['ID_UTE','NOM_DESIGNATION_OBJET','estSupprimer'];
}
