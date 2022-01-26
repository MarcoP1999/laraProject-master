<?php

namespace App\Models;

use App\Models\Resources\Eventi;
use App\Models\Resources\Prodotto;
use App\Models\Resources\Utente;
use App\Models\Resources\FAQ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use PhpParser\Node\Expr\Array_;

class AdminModel extends Model
{
    public function getProdotti() {
        $prodotti = DB::table('products')
            ->paginate(5);
        return $prodotti;
    }

    public function setNewProductData($request){
        $product = new Prodotto;
        $product->fill($request->all());
        $product->image_catalogo = 'default.png';
        $imageName = NULL;
        $product->save();

        if ($request->hasFile('image_catalogo')) {
            $image = $request->file('image_catalogo');
            $imageName = $image->getClientOriginalName();
            $ext = pathinfo($imageName, PATHINFO_EXTENSION);
            $imageName = $product->product_id;
            $imageName .= '.'.$ext;
            $product->image_catalogo = $imageName;
            $product->save();
        }

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/';
            $image->move($destinationPath, $imageName);
        }
    }

    public function cancellaProdottoDB($id){
        $prodotto = Prodotto::find($id);
        if($prodotto->image_catalogo != 'default.png' && file_exists(public_path() . '/images/' . $prodotto->image_catalogo))
            unlink(public_path() . '/images/' . $prodotto->image_catalogo);
        $prodotto->delete();
    }
    public function setProductData($request){

        $prodotto=Prodotto::find($request->get('product_id'));
        $prodotto->nome_e_codice= $request->get('nome_e_codice');
        $prodotto->descrizione= $request->get('descrizione');
        $prodotto->modi_installazione= $request->get('modi_installazione');
        $prodotto->note_buon_uso= $request->get('note_buon_uso');
        $prodotto->save();

        $imageName = NULL;

        if ($request->hasFile('image_catalogo')) {
            $image = $request->file('image_catalogo');
            $imageName = $image->getClientOriginalName();
            $ext = pathinfo($imageName, PATHINFO_EXTENSION);
            $imageName = $prodotto->event_id;
            $imageName .= '.'.$ext;
            if($prodotto->image_catalogo != 'default.png' && file_exists(public_path() . '/images/' . $prodotto->image_catalogo) )
                unlink(public_path() . '/images/' . $prodotto->image_catalogo);
            $prodotto->image_catalogo = $imageName;
            $prodotto->save();
        }

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/';
            $image->move($destinationPath, $imageName);
        };
    }


    public function getTecn(){
        return Utente::where('livello_utenza', 2) -> orderBy('username') -> paginate(5);
    }

    public function deleteTecnDB ($id){

            $tecnico = Utente::find($id);
            $tecnico->delete();

    }

    public function getStaff(){
        return Utente::where('livello_utenza', 3) -> orderBy('username') -> paginate(5);
    }

    public function deleteStaffDB ($id){

        $utente = Utente::find($id);
        $utente->delete();
    }

    public function getTecnData ($id){
        return Utente::where('id', $id)->get();
    }

    public function getStaffData ($id){
        return Utente::where('id', $id)->get();
    }

    public function setStaffData ($request, $id){
        $utenti = Utente::where('id', $id)->get();
        $staff = $utenti[0];
        $staff->username= $request['username'];
        $staff->email= $request['email'];
        $staff->save();
    }

    public function setTecnData($request, $id){
        $utenti = Utente::where('id',$id)->get();
        $tecnici = $utenti[0];
        $tecnici->username= $request['username'];
        $tecnici->email= $request['email'];
        $tecnici->save();
    }

    public function addTecn ($request) {
        $tecnico = new Utente;
        $tecnico->fill($request->all());
        $tecnico->livello_utenza = '2';
        $tecnico->save();
    }

    public function addStaff ($request) {
        $staff = new Utente;
        $staff->fill($request->all());
        $staff->livello_utenza = '3';
        $staff->save();
    }

    public function getFaq() {
        return FAQ::all();
    }

    public function addFaq ($post) {
        //dd($request);
        $faq = new FAQ;
        $faq->domanda = $post['domanda'];
        $faq->risposta = $post['risposta'];
        $faq->save();
    }

    public function getFaqData($id) {
        return FAQ::where('id', $id)->get();
    }

    public function setFaqData ($post, $id){
        $allFaq = FAQ::where('id', $id)->get();
        $faq = $allFaq[0];
        $faq->domanda= $post['domanda'];
        $faq->risposta= $post['risposta'];
        $faq->save();
    }

    public function deleteFaqDB($id) {
        $faq = FAQ::find($id);
        $faq->delete();
    }



}
