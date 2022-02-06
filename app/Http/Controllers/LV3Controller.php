<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewMalfunctionRequest;
use App\Http\Requests\NewProductRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\StaffModel;
use App\Models\PublicModel;
use Illuminate\Support\Facades\Auth;

class LV3Controller extends Controller
{
  protected $_StaffModel;
  protected $_PublicModel;
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
      $this->_StaffModel = new StaffModel;
      $this->_PublicModel = new PublicModel;
  }

  public function showAreaStaff()
  {
      $_PublicModel=new PublicModel;
      $prodotti = $this->_PublicModel->getProducts();


      return view('staff.area_staff')
          ->with('prodotti', $prodotti);
  }

    public function showGestione3($id_prodotto) {

        $malfunzionamenti = $this->_PublicModel->getMalfunctionDetails($id_prodotto);


        return view('staff.gestione3_malf')
            ->with('id_prodotto', $id_prodotto)
            ->with('malfunzionamenti', $malfunzionamenti);
    }

    public function addMalf3($id_prodotto) {
        return view('staff.nuovo_malf3')
            ->with('id_prodotto', $id_prodotto);
    }

    public function addNewMalf3 (NewMalfunctionRequest $request) {
        $this->_PublicModel->addMalf($request);
        $malfunzionamenti = $this->_PublicModel->getMalfunctionDetails($request->id_prodotto);


        return view('staff.gestione3_malf')
            ->with('id_prodotto', $request->id_prodotto)
            ->with('malfunzionamenti', $malfunzionamenti);
    }

    public function showMalfModify3($id_malfunzionamento){
        $_PublicModel=new PublicModel;
        $dati_malf= $_PublicModel->getMalfData($id_malfunzionamento);
        return view('staff.modifica_malf3')
            ->with('dati_malf', $dati_malf[0]);
    }

    public function modifyDataMalf3 (NewMalfunctionRequest $request, $id_malfunzionamento){


        $id_prodotto=$this->_PublicModel->setMalfData($request, $id_malfunzionamento);
        $malfunzionamenti = $this->_PublicModel->getMalfunctionDetails($id_prodotto);
        return view('staff.gestione3_malf')
            ->with('id_prodotto', $id_prodotto)
            ->with('malfunzionamenti', $malfunzionamenti);
    }

    public function deleteMalf3($id_malfunzionamento){
        $id_prodotto=$this->_PublicModel->deleteMalf( $id_malfunzionamento);
        $malfunzionamenti = $this->_PublicModel->getMalfunctionDetails($id_prodotto);
        return view('staff.gestione3_malf')
            ->with('id_prodotto', $id_prodotto)
            ->with('malfunzionamenti', $malfunzionamenti);
    }


}
