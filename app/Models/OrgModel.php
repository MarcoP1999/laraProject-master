<?php

namespace App\Models;
use App\Models\Resources\Biglietto;
use Illuminate\Support\Facades\DB;
use App\Models\Resources\Utente;
use App\Models\Resources\Eventi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class OrgModel extends Model
{
     public function getStaffData($id_utente){
        return Utente::where('id', $id_utente)->get();
    }

    public function setNewEventData($request){
        $event = new Eventi;
        $event->fill($request->all());
        $event->image_catalogo = 'default.png';
        $imageName = NULL;
        $event->org_name=Utente::find(Auth::id())->nome_org;
        $event->biglietti_rimasti= $request->get('biglietti_totali');
        $event->save();

        if ($request->hasFile('image_catalogo')) {
            $image = $request->file('image_catalogo');
            $imageName = $image->getClientOriginalName();
            $ext = pathinfo($imageName, PATHINFO_EXTENSION);
            $imageName = $event->event_id;
            $imageName .= '.'.$ext;
            $event->image_catalogo = $imageName;
            $event->save();
        }

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/';
            $image->move($destinationPath, $imageName);
        }
    }
    public function getEventiOrganizzati($id_utente){
        $organame = DB::table('users')
         ->select('username')
         ->where('id', '=', $id_utente)
         ->get();
       //dd($organame[0]->nome_org);
    $eventi =Eventi::where('org_name', '=', $organame[0]->nome_org)
        ->orderByDesc('event_id')
        ->paginate(4);
    return $eventi;
    }

    public function cancellaEventoDB($id){
      $evento = Eventi::find($id);
      if($evento->image_catalogo != 'default.png' && file_exists(public_path() . '/images/' . $evento->image_catalogo))
          unlink(public_path() . '/images/' . $evento->image_catalogo);
      $biglietti = Biglietto::where('id_evento', $id)->get();
      foreach($biglietti as $biglietto) $biglietto->delete();
      $evento->delete();
    }
    public function setEventData($request){

        $evento=Eventi::find($request->get('event_id'));
        $evento->artista= $request->get('artista');
        $evento->data= $request->get('data');
        $evento->ora= $request->get('ora');
        $evento->luogo= $request->get('luogo');
        $evento->costo= $request->get('costo');
        $evento->percentuale_sconto= $request->get('percentuale_sconto');
        $evento->giorni_sconto= $request->get('giorni_sconto');
        $evento->programma= $request->get('programma');
        $evento->descrizione= $request->get('descrizione');
        $evento->regione= $request->get('regione');
        $evento->indicazioni= $request->get('indicazioni');
        $evento->biglietti_totali= $request->get('biglietti_totali');
        $biglietti_rimasti = ($request->get('biglietti_totali')) - count(Biglietto::where('id_evento', $request->get('event_id'))->get());
        if ($biglietti_rimasti < 0) abort(403, "Non puoi ridurre il numero per la quantità inserita");
        else $evento->biglietti_rimasti = ($request->get('biglietti_totali')) - count(Biglietto::where('id_evento', $request->get('event_id'))->get());
        $evento->save();

        $imageName = NULL;

        if ($request->hasFile('image_catalogo')) {
            $image = $request->file('image_catalogo');
            $imageName = $image->getClientOriginalName();
            $ext = pathinfo($imageName, PATHINFO_EXTENSION);
            $imageName = $evento->event_id;
            $imageName .= '.'.$ext;
            if($evento->image_catalogo != 'default.png' && file_exists(public_path() . '/images/' . $evento->image_catalogo) )
                unlink(public_path() . '/images/' . $evento->image_catalogo);
            $evento->image_catalogo = $imageName;
            $evento->save();
        }

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/';
            $image->move($destinationPath, $imageName);
        };
    }
}
