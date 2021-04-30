<?php

namespace App\Bon_Transfert;

use Illuminate\Database\Eloquent\Model;

class Choisir_pour extends Model
{
    protected $fillable = ['NUMERO_BON_TRANSFERT','QTE_TRANSFERT','ID_DESIGNATION_OBJET'];
}
