<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

    public function showGestione3($product_id) {

        $info= $this->_PublicModel->getProductDetails($product_id);
        $malfunzionamenti=[];
        for( $i=0;$i<sizeof($info);$i++){
            array_push($malfunzionamenti,$info[$i]->descrizione_malfunzionamenti);
        }

        return view('gestione_prodotto')
            ->with('info', $malfunzionamenti);
    }

}
