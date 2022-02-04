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

Route::get('/staff/gestione3/{product_id}', 'Lv3Controller@showGestione3') -> name('gestione3')->middleware('can:isStaff');

Route::post('/admin/gestione_prod4', 'Lv4Controller@showGestioneProd4') -> name('gestione_prod4')->middleware('can:isAdmin');
Route::get('/admin/gestione4/{product_id}', 'Lv4Controller@showGestione4') -> name('gestione4')->middleware('can:isAdmin');

// Rotta area staff
Route::get('/staff', 'LV3Controller@showAreaStaff') -> name('staff_area')->middleware('can:isStaff');

// Rotta per scheda prodotto
Route::get('/prodotto/{id_prodotto}', 'PublicController@productDetails') -> name('productDetails');
Route::get('/prodotto/{product_id}', 'PublicController@productDetails') -> name('productDetails');

Route::get('/soluzione/{id_prodotto}', 'PublicController@solutionDetails') -> name('solutionDetails');
Route::get('/soluzione/{product_id}', 'PublicController@solutionDetails') -> name('solutionDetails');

// Rotte per l'autenticazione
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
    ->name('logout');

// Rotta per home lv.4
Route::get('/admin', 'LV4Controller@showAreaAdmin') -> name('admin')->middleware('can:isAdmin');

// Rotta crea prodotto
Route::view('/admin/creaprodotto', 'admin.nuovo_prodotto') -> name('nuovoProdotto')->middleware('can:isAdmin');
Route::post('/admin/creaprodotto', 'LV4Controller@creaProdotto') -> name('creaProdotto')->middleware('can:isAdmin');

//Rotta per cancellare prodotti
Route::get('/admin/cancellaprodotto/{id}', 'LV4Controller@cancellaProdotto') -> name('cancellaProdotto')->middleware('can:isAdmin');

//Rotte per modifica prodotti
Route::get('/admin/modificaprodotto/{id_evento}', 'LV4Controller@showFormModificaProdotto') -> name('modificaProdotto')->middleware('can:isAdmin');
Route::post('/admin/modificaprodotto', 'LV4Controller@modificaProdotto') -> name('modProdotto')->middleware('can:isAdmin');

Route::get('/admin/cancellaprodotto/{id}', 'LV4Controller@cancellaProdotto') -> name('cancellaProdotto')->middleware('can:isAdmin');

Route::post('/admin/gestioneprodotti4/gestionemalfsol4/nuovo_malf4', 'LV4Controller@addNewMalf4') -> name('addNewMalf4') -> middleware('can:isAdmin');

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

Route::get('/admin/faq', 'LV4Controller@showFaqAdmin') -> name('showFaqAdmin') -> middleware('can:isAdmin');

Route::view('/admin/faq/aggiungi', 'admin.aggiungi_faq') -> name('addFaq') -> middleware('can:isAdmin');
Route::post('/admin/faq/aggiungi', 'LV4Controller@addNewFaq') -> name('addNewFaq') -> middleware('can:isAdmin');

Route::get('/admin/faq/modifica/{id}', 'LV4Controller@showFaqModify') -> name('modifyFaq') -> middleware('can:isAdmin');
Route::post('/admin/faq/modifica/{id}', 'LV4Controller@modifyDataFaq') -> name('modifyDataFaq') -> middleware('can:isAdmin');

Route::get('/admin/faq/elimina/{id}', 'LV4Controller@deleteFaq') -> name('deleteFaq') -> middleware('can:isAdmin');
