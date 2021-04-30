<?php

namespace App\Bon_Transfert;

use Illuminate\Database\Eloquent\Model;

class Bon_de_transfert extends Model
{
    protected $fillable = ['NUMERO_BON_TRANSFERT','ID_UTILISATEUR','ID_LIEU',"OBJET",'ID_BESOIN','PROVENANCE_BON_TRANSFERT',"ID_PROJET"];
}
