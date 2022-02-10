<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewMalfunctionRequest;
use App\Http\Requests\NewProductRequest;
use App\Http\Requests\NewSolutionRequest;
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
      $_StaffModel=new StaffModel;
      $prodotti = $this->_StaffModel->getProducts();


      return view('staff.area_staff')
          ->with('prodotti', $prodotti);
  }

    public function showGestione3($id_prodotto) {
          if (!$this->_StaffModel->checkStaff($id_prodotto, Auth::id())) abort(403, "Non puoi accedere a queste informazioni");
          $malfunzionamenti = $this->_PublicModel->getMalfunctionDetails($id_prodotto);

        return view('staff.gestione3_malf')
            ->with('id_prodotto', $id_prodotto)
            ->with('malfunzionamenti', $malfunzionamenti);
    }

    public function showGestSol3($id_malfunzionamento) {
        if (!$this->_StaffModel->checkStaffDet($id_malfunzionamento, Auth::id())) abort(403, "Non puoi accedere a queste informazioni");

        $soluzioni = $this->_PublicModel->getSolutionsDetails($id_malfunzionamento);


        return view('staff.gestione3_sol')
            ->with('id_malfunzionamento', $id_malfunzionamento)
            ->with('soluzioni', $soluzioni);
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

    public function addSol3($id_malfunzionamento) {
        return view('staff.nuova_sol3')
            ->with('id_malfunzionamento', $id_malfunzionamento);
    }

    public function addNewSol3 (NewSolutionRequest $request) {
        $this->_PublicModel->addSol($request);
        $soluzioni = $this->_PublicModel->getSolutionsDetails($request->id_malfunzionamento);


        return view('staff.gestione3_sol')
            ->with('id_malfunzionamento', $request->id_malfunzionamento)
            ->with('soluzioni', $soluzioni);
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

    public function showSolModify3($id_soluzione){
        $_PublicModel=new PublicModel;
        $dati_sol= $_PublicModel->getSolData($id_soluzione);
        return view('staff.modifica_sol3')
            ->with('dati_sol', $dati_sol[0]);
    }

    public function modifyDataSol3 (NewSolutionRequest $request, $id_soluzione){


        $id_malfunzionamento=$this->_PublicModel->setSolData($request, $id_soluzione);
        $soluzioni = $this->_PublicModel->getSolutionsDetails($id_malfunzionamento);
        return view('staff.gestione3_sol')
            ->with('id_malfunzionamento', $id_malfunzionamento)
            ->with('soluzioni', $soluzioni);
    }

    public function deleteMalf3 ($id_malfunzionamento){
        $id_prodotto=$this->_PublicModel->deleteMalf( $id_malfunzionamento);
        $malfunzionamenti = $this->_PublicModel->getMalfunctionDetails($id_prodotto);

        return view('staff.gestione3_malf')
            ->with('id_prodotto', $id_prodotto)
            ->with('malfunzionamenti', $malfunzionamenti);
    }

    public function deleteSol3 ($id_soluzione){
        $id_malfunzionamento=$this->_PublicModel->deleteSol( $id_soluzione);
        $soluzioni = $this->_PublicModel->getSolutionsDetails($id_malfunzionamento);
        return view('staff.gestione3_sol')
            ->with('id_malfunzionamento', $id_malfunzionamento)
            ->with('soluzioni', $soluzioni);
    }



}
