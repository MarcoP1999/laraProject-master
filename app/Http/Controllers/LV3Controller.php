<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewProductRequest;
use Illuminate\Http\Request;
use App\Models\OrgModel;
use App\Models\PublicModel;
use Illuminate\Support\Facades\Auth;

class LV3Controller extends Controller
{
  protected $_OrgModel;
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
      $this->_OrgModel = new OrgModel;
  }

  public function showAreaOrganizzatori()
  {
    $dati_org=$this->_OrgModel->getOrgData(Auth::id());
    $eventi=$this->_OrgModel->getEventiOrganizzati(Auth::id());

    $obj = new PublicModel();
    $sconti = [];
      foreach ($eventi as $evento) {
          array_push($sconti, $obj->checkDiscount($evento->event_id));
      }

    return view('staff.area_organizzatori')
    ->with('eventi',$eventi)
    ->with('dati',$dati_org[0])
    ->with('sconti', $sconti);;
  }

  public function creaEvento(NewProductRequest $request){

    $this->_OrgModel->setNewEventData($request);
    return redirect()->route('org_area');
  }

  public function cancellaEvento($id){
    $this->_OrgModel->cancellaEventoDB($id);
    return redirect('/staff');
  }
  public function showFormModificaEvento($id_evento){
      if(!$this->_OrgModel->checkOrg($id_evento,Auth::id())) abort(403, "Non puoi accedere a questa funzione");
      $_PublicModel= new PublicModel;
      $dati_evento=$_PublicModel->getEventDetails($id_evento);
      return view('staff.modifica_evento')
          ->with('dati', $dati_evento[0]);
  }
  public function modificaEvento(NewProductRequest $request){
      $this->_OrgModel->setEventData($request);
      return redirect()->route('org_area')->with('alert', 'Modifiche avvenute con successo');
  }
  public function processArtistEvents() {
      return redirect()->route('filteredEvents',
          [$_POST['artista']]);
  }

  public function showFilteredEvents($artista) {

      $filteredOrgEvents = $this->_OrgModel->getFilteredOrgEvents($artista);
      $dati_org=$this->_OrgModel->getOrgData(Auth::id());

      $obj = new PublicModel();
      $sconti = [];
      foreach ($filteredOrgEvents as $evento) {
          array_push($sconti, $obj->checkDiscount($evento->event_id));
      }
      return view('staff.area_organizzatori')
          ->with('eventi', $filteredOrgEvents)
          ->with('dati', $dati_org[0] )
          ->with('artista', $artista)
          ->with('sconti', $sconti);

  }
}
