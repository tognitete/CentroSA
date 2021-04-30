<?php

namespace App\Bon_Commande;

use Illuminate\Database\Eloquent\Model;

class Commander extends Model
{
    protected $fillable = ['NUMERO_BON_COMMANDE','ID_DESIGNATION_OBJET','QTE_COMMANDE','PRIX_UNIT'];
}
