<?php

namespace App\Bon_Commande;

use Illuminate\Database\Eloquent\Model;

class Bon_de_commande extends Model
{
    protected $fillable = ["NUMERO_BON_COMMANDE",'ID_UTILISATEUR',"OBJET",'ID_TYPE_COMMANDE',"ID_LIEU","MATRICULE_FRS","ID_BESOIN","MONTANT_TOTAL","DATE_COMMANDE","TAUX_AVANCE","DELAIS","COMMENTAIRE","AVANCE_FAIT","TOTAL_FAIT","ID_PROJET"];
}
