<?php

namespace App\Models;

use App\Models\Resources\Eventi;
use App\Models\Resources\Malfunzionamento;
use App\Models\Resources\Partecipazione;
use App\Models\Resources\Soluzione;
use App\Models\Resources\Prodotto;
use App\Models\Resources\Utente;
use App\Models\Resources\FAQ;
use DateInterval;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PublicModel
{
    public function getProducts() {
        $prodotti = DB::table('products')
            ->paginate(5);
        return $prodotti;
    }

    public function getProductDetails($id_prodotto) {

        $prodotti = Prodotto::where('product_id',$id_prodotto)
            ->get();
        return $prodotti;
    }

    public function getMalfunctionDetails($id_prodotto) {

        $malfunzionamenti = Prodotto::join('malfunctions', 'products.product_id', 'malfunctions.id_prodotto')
            ->where('products.product_id',$id_prodotto)
            ->get();
        return $malfunzionamenti;
    }

    public function getSolutionsDetails($id_malfunzionamento) {

        $soluzioni = Malfunzionamento::join('solutions', 'malfunctions.malfunction_id', 'solutions.id_malfunzionamento')
            ->where('malfunctions.malfunction_id',$id_malfunzionamento)
            ->get();
        return $soluzioni;
    }

    public function getFilteredProducts( $request) {

        $prodotti = Prodotto::where('product_id', '!=', 'null')
            ->orderBy('nome_e_codice');

        if($request['descrizione'] != "") {
           if (substr($request['descrizione'],-1)=='*')
               $prodotti = $prodotti->where('descrizione', 'LIKE', substr($request['descrizione'],0,-1). '%');
           else
               $prodotti = $prodotti->where('descrizione', 'LIKE', $request['descrizione']);
        }



        return $prodotti->paginate(1);
    }

    public function addMalf( $request) {
        //dd($request);
        $malfunzionamento = new Malfunzionamento;
        $malfunzionamento->id_prodotto=$request->id_prodotto;
        $malfunzionamento->descrizione_malfunzionamento=$request->descrizione_malfunzionamento;
        $malfunzionamento->save();
    }

    public function addSol( $request) {
        //dd($request);
        $soluzione = new Soluzione;
        $soluzione->id_malfunzionamento=$request->id_malfunzionamento;
        $soluzione->descrizione_soluzione=$request->descrizione_soluzione;
        $soluzione->save();
    }

    public function getMalfData($id_malfunzionamento) {
        return Malfunzionamento::where('malfunction_id', $id_malfunzionamento)->get();
    }

    public function setMalfData ($request, $id_malfunzionamento){
        $allMalfunctions = Malfunzionamento::where('malfunction_id', $id_malfunzionamento)->get();
        $malfunction = $allMalfunctions[0];
        $malfunction->descrizione_malfunzionamento= $request->descrizione_malfunzionamento;
        $malfunction->save();
        return $malfunction->id_prodotto;
    }

    public function getSolData($id_soluzione) {
        return Soluzione::where('solution_id', $id_soluzione)->get();
    }

    public function setSolData ($request, $id_soluzione){
        $allSolutions = Soluzione::where('solution_id', $id_soluzione)->get();
        $solution = $allSolutions[0];
        $solution->descrizione_soluzione= $request->descrizione_soluzione;
        $solution->save();
        return $solution->id_malfunzionamento;
    }

    public function deleteMalf($id_malfunzionamento) {
        $malfunction = Malfunzionamento::find($id_malfunzionamento);
        $id_prodotto=$malfunction->id_prodotto;
        $malfunction->delete();
        return $id_prodotto;
    }

    public function deleteSol($id_soluzione) {
        $solution = Soluzione::find($id_soluzione);
        $id_malfunzionamento=$solution->id_malfunzionamento;
        $solution->delete();
        return $id_malfunzionamento;
    }

    public function getFAQ() {

        $faq = FAQ::all();

        return $faq;
    }


}
