<?php

namespace App\Comptabilite;

use Illuminate\Database\Eloquent\Model;

class facture extends Model
{
    protected $fillable = ['ID_TYPE_FACTURE','ID_CATEGORIE_FACTURE','NUMERO_BON_COMMANDE','NUMERO_FACTURE','OBJET_FACTURE','DATE_FACTURE','DATE_RECEPTION_FACTURE'];
}
