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

// Rotta per la home
Route::get('/', 'PublicController@showHome') -> name('home1');

// Rotte per il catalogo
Route::get('/catalogo', 'PublicController@showCatalog') -> name('showCatalog');

Route::get('/catalogo/filtro', 'PublicController@showFilteredCatalog') -> name('showFilteredCatalog');

// Rotta per faq
Route::get('/faq', 'PublicController@showFAQ') -> name('faq');

// Rotta per contatti
Route::view('/contatti', 'contatti') -> name('contatti');


// Rotta area staff
Route::get('/staff', 'LV3Controller@showAreaStaff') -> name('staff_area')->middleware('can:isStaff');

// Rotta gestione malfunzionamenti e soluzioni staff
Route::get('/staff/gestionemalf3/{product_id}', 'Lv3Controller@showGestione3') -> name('gestione3')->middleware('can:isStaff');
Route::get('/staff/gestionemalf3/gestionesol3/{malfunction_id}', 'Lv3Controller@showGestSol3') -> name('gestSol3')->middleware('can:isStaff');

Route::get('/staff/gestionemalf3/nuovo_malf3/{id_prodotto}', 'LV3Controller@addMalf3') -> name('addMalf3') -> middleware('can:isStaff');
Route::post('/staff/gestionemalf3/nuovo_malf3', 'LV3Controller@addNewMalf3') -> name('addNewMalf3') -> middleware('can:isStaff');

Route::get('/staff/gestionemalf3/gestionesol3/nuova_sol3/{id_malfunzionamento}', 'LV3Controller@addSol3') -> name('addSol3') -> middleware('can:isStaff');
Route::post('/staff/gestionemalf3/gestionesol3/nuova_sol3', 'LV3Controller@addNewSol3') -> name('addNewSol3') -> middleware('can:isStaff');

Route::get('/staff/gestionemalf3/mod_malf3/{id_malfunzionamento}', 'LV3Controller@showMalfModify3') -> name('modifyMalf3') -> middleware('can:isStaff');
Route::post('/staff/gestionemalf3/mod_malf3/{id_malfunzionamento}', 'LV3Controller@modifyDataMalf3') -> name('modifyDataMalf3') -> middleware('can:isStaff');

Route::get('/staff/gestionemalf3/gestionesol3/mod_sol3/{id_soluzione}', 'LV3Controller@showSolModify3') -> name('modifySol3') -> middleware('can:isStaff');
Route::post('/staff/gestionemalf3/gestionesol3/mod_sol3/{id_soluzione}', 'LV3Controller@modifyDataSol3') -> name('modifyDataSol3') -> middleware('can:isStaff');

Route::get('/staff/gestione_malf3/{id_malfunzionamento}', 'LV3Controller@deleteMalf3') -> name('deleteMalf3') -> middleware('can:isStaff');

Route::get('/staff/gestione_malf3/gestione_sol3/{id_soluzione}', 'LV3Controller@deleteSol3') -> name('deleteSol3') -> middleware('can:isStaff');

// Rotta per scheda prodotto
Route::get('/prodotto/{id_prodotto}', 'PublicController@productDetails') -> name('productDetails');
// Rotta per scheda soluzioni
Route::get('/soluzione/{id_prodotto}', 'PublicController@solutionDetails') -> name('solutionDetails');

// Rotte per l'autenticazione
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
    ->name('logout');

// Rotta per home lv.4
Route::get('/admin', 'LV4Controller@showAreaAdmin') -> name('admin')->middleware('can:isAdmin');

// Rotte gestione prodotto
Route::get('/admin/associastaff/creaprodotto/{id}', 'LV4Controller@showCreaProdotto') -> name('nuovoProdotto')->middleware('can:isAdmin');
Route::post('/admin/associastaff/creaprodotto', 'LV4Controller@creaProdotto') -> name('creaProdotto')->middleware('can:isAdmin');

Route::get('/admin/modificaprodotto/{id_prodotto}', 'LV4Controller@showFormModificaProdotto') -> name('modificaProdotto')->middleware('can:isAdmin');
Route::post('/admin/modificaprodotto', 'LV4Controller@modificaProdotto') -> name('modProdotto')->middleware('can:isAdmin');

Route::get('/admin/associastaff', 'LV4Controller@assStaff') -> name('assStaff') -> middleware('can:isAdmin');

Route::get('/admin/cancellaprodotto/{id}', 'LV4Controller@cancellaProdotto') -> name('cancellaProdotto')->middleware('can:isAdmin');

//Rotte per gestione malfunzionamento e soluzioni admin
Route::get('/admin/gestione_prod4', 'Lv4Controller@showGestioneProd4') -> name('gestione_prod4')->middleware('can:isAdmin');
Route::get('/admin/gestione_prod4/gestione4/{product_id}', 'Lv4Controller@showGestione4') -> name('gestione4')->middleware('can:isAdmin');
Route::get('/admin/gestione_prod4/gestione4/gestmalf4/{malfunction_id}', 'Lv4Controller@showGestSol4') -> name('gestSol4')->middleware('can:isAdmin');

Route::get('/admin/gestioneprodotti4/gestionemalf4/nuovo_malf4/{id_prodotto}', 'LV4Controller@addMalf4') -> name('addMalf4') -> middleware('can:isAdmin');
Route::post('/admin/gestioneprodotti4/gestionemalf4/nuovo_malf4', 'LV4Controller@addNewMalf4') -> name('addNewMalf4') -> middleware('can:isAdmin');

Route::get('/admin/gestioneprodotti4/gestionemalf4/gestionesol4/nuova_sol4/{id_malfunzionamento}', 'LV4Controller@addSol4') -> name('addSol4') -> middleware('can:isAdmin');
Route::post('/admin/gestioneprodotti4/gestionemalf4/gestionesol4/nuova_sol4', 'LV4Controller@addNewSol4') -> name('addNewSol4') -> middleware('can:isAdmin');

Route::get('/admin/gestioneprodotti4/gestionemalf4/mod_malf4/{id_malfunzionamento}', 'LV4Controller@showMalfModify4') -> name('modifyMalf4') -> middleware('can:isAdmin');
Route::post('/admin/gestioneprodotti4/gestionemalf4/mod_malf4/{id_malfunzionamento}', 'LV4Controller@modifyDataMalf4') -> name('modifyDataMalf4') -> middleware('can:isAdmin');

Route::get('/admin/gestioneprodotti4/gestionemalf4/gestionesol4/mod_sol4/{id_soluzione}', 'LV4Controller@showSolModify4') -> name('modifySol4') -> middleware('can:isAdmin');
Route::post('/admin/gestioneprodotti4/gestionemalf4/gestionesol4/mod_sol4/{id_soluzione}', 'LV4Controller@modifyDataSol4') -> name('modifyDataSol4') -> middleware('can:isAdmin');

Route::get('/admin/gestioneprodotti4/gestionemalf4/{id_malfunzionamento}', 'LV4Controller@deleteMalf4') -> name('deleteMalf4') -> middleware('can:isAdmin');

Route::get('/admin/gestioneprodotti4/gestionemalf4/gestionesol4/{id_soluzione}', 'LV4Controller@deleteSol4') -> name('deleteSol4') -> middleware('can:isAdmin');

//Rotte per gestione utenti
Route::get('/admin/tecnici', 'LV4Controller@showTecn') -> name('showTecn') -> middleware('can:isAdmin');

Route::get('/admin/staff', 'LV4Controller@showStaff') -> name('showStaff') -> middleware('can:isAdmin');

Route::get('/admin/tecnici/elimina/{id}', 'LV4Controller@deleteTecn') -> name('deleteTecn') -> middleware('can:isAdmin');
Route::get('/admin/staff/elimina/{id}', 'LV4Controller@deleteStaff') -> name('deleteStaff') -> middleware('can:isAdmin');

Route::get('/admin/staff/modificatecn/{id}', 'LV4Controller@showFormModifyTecn') -> name('modifyTecn') -> middleware('can:isAdmin');
Route::post('/admin/staff/modificatecn/{id}', 'LV4Controller@modifyDataTecn') -> name('modifyDataTecn') -> middleware('can:isAdmin');

Route::get('/admin/tecnici/modificastaff/{id}', 'LV4Controller@showFormModifyStaff') -> name('modifyStaff') -> middleware('can:isAdmin');
Route::post('/admin/tecnici/modificastaff/{id}', 'LV4Controller@modifyDataStaff') -> name('modifyDataStaff') -> middleware('can:isAdmin');

Route::view('/admin/tecnici/addtecn', 'admin.aggiungi_tecnico') -> name('addTecn') -> middleware('can:isAdmin');
Route::post('/admin/tecnici/addtecn', 'LV4Controller@addNewTecn') -> name('addNewTecn') -> middleware('can:isAdmin');

Route::view('/admin/staff/addstaff', 'admin.aggiungi_staff') -> name('addStaff') -> middleware('can:isAdmin');
Route::post('/admin/staff/addstaff', 'LV4Controller@addNewStaff') -> name('addNewStaff') -> middleware('can:isAdmin');

//Rotte per gestione FAQ
Route::get('/admin/faq', 'LV4Controller@showFaqAdmin') -> name('showFaqAdmin') -> middleware('can:isAdmin');

Route::view('/admin/faq/aggiungi', 'admin.aggiungi_faq') -> name('addFaq') -> middleware('can:isAdmin');
Route::post('/admin/faq/aggiungi', 'LV4Controller@addNewFaq') -> name('addNewFaq') -> middleware('can:isAdmin');

Route::get('/admin/faq/modifica/{id}', 'LV4Controller@showFaqModify') -> name('modifyFaq') -> middleware('can:isAdmin');
Route::post('/admin/faq/modifica/{id}', 'LV4Controller@modifyDataFaq') -> name('modifyDataFaq') -> middleware('can:isAdmin');

Route::get('/admin/faq/elimina/{id}', 'LV4Controller@deleteFaq') -> name('deleteFaq') -> middleware('can:isAdmin');
