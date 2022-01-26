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

  public function showAreaStaff()
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
}
