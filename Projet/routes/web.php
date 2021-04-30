<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/','AppController@index')->name('home_path');

//Route::get('/','AppController@login')->name('login');

Route::get('/',function(){

	return view('auth.login');
});


Route::group([

	'namespace' =>'Admin', 
	'prefix'=>'admin'

	         ], function(){

	Route::resource('posts','PostsController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    
 Route::get('/Users','AppController@create');

Route::get('/Acueil','AppController@Acueil')->name('acueil');
//Route::get('/','AppController@search');

//Route::post('/BonCommande','BonCommandeController@create');

//Route::post('/BonCommande','PDFController@pdf')->name('pdf');

Route::get('/Besoin_Appro','BesoinApproController@index');

//Route::get('/Besoin_Logistique','BesoinLogistiqueController@index');

Route::get('/BonCommande/pdf','BonCommandeController@pdf');

Route::get('/Comptabilite','ComptaController@index')->name('compta');

Route::get('/confirm','FactureController@confirm')->name('confirm');

Route::get('/FAVANCE','FactureController@AFAVANCE')->name('FAVANCE');

Route::get('/SFAVANCE','FactureController@SAFAVANCE')->name('SFAVANCE');

Route::get('/FSOLDE','FactureController@FSOLDE')->name('FSOLDE');

Route::get('/SFSOLDE','FactureController@SFSOLDE')->name('SFSOLDE');

Route::get('/FACTURE_AVANCE','FactureController@indexAvec')->name('FACTURE_AVANCE');

Route::get('/FACTURE_SANS_AVANCE','FactureController@indexSans')->name('FACTURE_SANS_AVANCE');

Route::get('/choix_frs_paye','ComptaController@choix_frs_paye')->name('ch.frs.p');

Route::get('/choix_frs_impaye','ComptaController@choix_frs_impaye')->name('ch.frs.ip');;

Route::get('/Users','AppController@create');

Route::get('/Rapport/paye','RapportController@paye');

Route::get('/Rapport/impaye','RapportController@impaye');



Route::get('/desi_destroy','DesignationObjetController@destroy_');


Route::get('/fournisseur_destroy','FournisseurController@destroy_');


Route::get('/infosArticles','DesignationObjetController@info');


Route::get('/Liste_Facture','FactureController@index')->name('listeFacture');

Route::get('/FactureDetail','FactureController@show_')->name('Facture.show_');

Route::get('/Users/index','UserController@index')->name('user.index');

Route::get('/Users/Modification','UserController@update')->name('user.update');

Route::post('/Users/Modification','UserController@postUpdate')->name('user.postUpdate');

Route::get('/Users/Suppression','UserController@destroy')->name('user.destroy');

Route::post('/Users/Suppression','UserController@postDestroy')->name('user.postDestroy');

Route::get('/Users/Droit','UserController@droit')->name('user.droit');

//Route::get('/Users/Liste','UserController@liste')->name('user.liste');

Route::post('/Users/Droit','UserController@postDroit')->name('user.postDroit');

Route::get('/logout','UserController@logout')->name('logout');





Route::get('/slide',function(){

	return view('slide');
});
Route::get('/nav',function(){

	return view('nav');
});

Route::get('/etat',function(){

	return view('etat');
});



Route::post('/Users','AppController@store')->name('Users');

Route::post('/SFSOLDE','FactureController@store_SOLDE')->name('SFSOLDE.post');

Route::post('/SFAVANCE','FactureController@store_AVANCE')->name('SFAVANCE.post');

Route::post('/FACTURE_SANS_AVANCE','FactureController@store_SOLDE');

Route::post('/','AppController@index');

Route::post('/choix_frs_paye','ComptaController@post_choix_frs_paye')->name('paye.post');

Route::post('/choix_frs_impaye','ComptaController@post_choix_frs_impaye')->name('impaye.post');

Route::resource('Rapport','RapportController');

Route::resource('Compta','ComptaController');

Route::resource('pdf','PDFController');

Route::resource('Facture','FactureController');

Route::resource('pdfTransfert','PDFTransfertController');

Route::get('/nb_destinationB','BonCommandeController@nb_destinationB')->name('nb_db');

Route::post('/nb_destinationB','BonCommandeController@index');

Route::get('/nb_destinationT','BonTransfertController@nb_destinationT')->name('nb_dt');

Route::post('/nb_destinationT','BonTransfertController@index');

Route::resource('BesoinAppro','BesoinApproController');

Route::resource('BonCommande','BonCommandeController');

Route::resource('BonTransfert','BonTransfertController');

Route::resource('DesignationObjet','DesignationObjetController');


Route::resource('objet','ObjetController');

Route::resource('projet','ProjetController');


Route::resource('fournisseur','FournisseurController');

Route::resource('ute','UTEController');

Route::resource('lieu','LieuController');


});