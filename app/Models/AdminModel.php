<?php

namespace App\Models;

use App\Models\Resources\Eventi;
use App\Models\Resources\Prodotti;
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

    public function getPersonalData($id_utente){
        return Utente::where('id', $id_utente)->get();
    }


}
