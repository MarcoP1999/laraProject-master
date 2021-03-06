<?php

namespace App\Http\Controllers;

use App\Models\PublicModel;
use Faker\Provider\DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PublicController extends Controller {

    protected $_PublicModel;

    public function __construct() {
        $this->_PublicModel = new PublicModel;
    }

    public function showHome() {

        return view('home');

    }

    public function showCatalog() {

        // Tutti gli eventi (senza filtro)
        $prodotti = $this->_PublicModel->getProducts();


        return view('catalogo')
            ->with('prodotti', $prodotti);

    }


    public function showFilteredCatalog(Request $request) {

        $filteredProducts = $this->_PublicModel->getFilteredProducts($request);
        $filteredProducts->appends($request->except('_token'));

        return view('catalogo')
            ->with('prodotti', $filteredProducts)
            ->with('request', $request);

    }

        public function productDetails($id_prodotto) {

            $prodotti = $this->_PublicModel->getProductDetails($id_prodotto);
            $malfunzionamenti = $this->_PublicModel->getMalfunctionDetails($id_prodotto);


            return view('scheda_prodotto')
                ->with('prodotto', $prodotti)
                ->with('malfunzionamenti', $malfunzionamenti);
        }

    public function solutionDetails($id_malfunzionamento) {

        $soluzioni = $this->_PublicModel->getSolutionsDetails($id_malfunzionamento);


        return view('scheda_soluzioni')
            ->with('soluzioni', $soluzioni);
    }

    public function showFAQ() {

        $faq = $this->_PublicModel->getFAQ();

        return view('faq')
            ->with('faq', $faq);
    }


    public function __call($method, $parameters)
    {
        parent::__call($method, $parameters); // TODO: Change the autogenerated stub
    }


}
