<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Http\Requests\NewProductRequest;
use App\Http\Requests\FaqRequest;
use App\Http\Requests\NewMalfunctionRequest;
use App\Http\Requests\NewSolutionRequest;
use App\Http\Requests\NewUserRequest;
use App\Http\Requests\ModifyUserRequest;
use App\Models\PublicModel;
use App\Models\UserModel;
use App\Models\AdminModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;


class LV4Controller extends Controller
{

    protected $_AdminModel;
    protected $_PublicModel;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->_AdminModel = new AdminModel;
        $this->_PublicModel = new PublicModel;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showAreaAdmin()
    {
        $_PublicModel=new PublicModel;
         $prodotti = $this->_PublicModel->getProducts();


        return view('admin.admin')
            ->with('prodotti', $prodotti);

    }

    public function showCreaProdotto($id){
        return view('admin.nuovo_prodotto')
            ->with('id', $id);
    }
    public function creaProdotto(NewProductRequest $request){

        $this->_AdminModel->setNewProductData($request);
        return redirect()->route('admin');
    }

    public function cancellaProdotto($id){
        $this->_AdminModel->cancellaProdottoDB($id);
        return redirect('/admin');
    }
    public function showFormModificaProdotto($id_prodotto){
        $_PublicModel= new PublicModel;
        $dati=$_PublicModel->getProductDetails($id_prodotto);
        return view('admin.modifica_prodotto')
            ->with('dati', $dati[0]);
    }

    public function modificaProdotto(NewProductRequest $request){
        $this->_AdminModel->setProductData($request);
        return redirect()->route('admin')->with('alert', 'Modifiche avvenute con successo');
    }

    public function showTecn(){
        $_AdminModel=new AdminModel;

        $tecnici = $_AdminModel->getTecn();

        return view ('admin.gestione_tecnici')
            ->with ('tecnici', $tecnici);
    }

    public function deleteTecn ($id){
        $_AdminModel=new AdminModel;

        $_AdminModel->deleteTecnDB($id);

        return redirect()->route('showTecn');
    }

    public function showStaff(){
        $_AdminModel=new AdminModel;

        $staff = $_AdminModel->getStaff();

        return view ('admin.gestione_staff')
            ->with ('staff', $staff);
    }

    public function assStaff(){
        $_AdminModel=new AdminModel;

        $staff = $_AdminModel->getStaff();

        return view ('admin.ass_staff')
            ->with ('staff', $staff);
    }

    public function deleteStaff ($id){
        $_AdminModel=new AdminModel;

        $_AdminModel->deleteStaffDB($id);

        return redirect()->route('showStaff');
    }

    public function showFormModifyTecn($id){
        $_AdminModel=new AdminModel;

        $dati_tecnico= $_AdminModel->getTecnData($id);
        return view('admin.modifica_dati_tecnico')
            ->with('dati_tecnico', $dati_tecnico[0]);
    }

    public function showFormModifyStaff($id){
        $_AdminModel=new AdminModel;

        $dati_staff= $_AdminModel->getStaffData($id);
        return view('admin.modifica_dati_staff')
            ->with('dati_staff', $dati_staff[0]);
    }

    public function modifyDataTecn (ModifyUserRequest $request, $id){
        if($_POST['password'] != $_POST['password_confirm']) return redirect()->back()->with('alert', 'Le password non corrispondono.');
        $ok =$this->_AdminModel->setTecnData($_POST, $id);
        return redirect()->route('showTecn')->with('alert', 'Modifiche avvenute con successo');
    }

    public function modifyDataStaff (ModifyUserRequest $request, $id){
        if($_POST['password'] != $_POST['password_confirm']) return redirect()->back()->with('alert', 'Le password non corrispondono.');
        $ok =$this->_AdminModel->setStaffData($_POST, $id);
        return redirect()->route('showStaff')->with('alert', 'Modifiche avvenute con successo');
    }

    public function addNewTecn (NewUserRequest $request){

        $this->_AdminModel->addTecn($request);
        return redirect()->route('showTecn');
    }
    public function addNewStaff (NewUserRequest $request){

        $this->_AdminModel->addStaff($request);
        return redirect()->route('showStaff');
    }

    public function showGestioneProd4()
    {
        $_PublicModel=new PublicModel;
        $prodotti = $this->_PublicModel->getProducts();


        return view('admin.gestione_prodotti4')
            ->with('prodotti', $prodotti);
    }

    public function showGestione4($id_prodotto) {

        $malfunzionamenti = $this->_PublicModel->getMalfunctionDetails($id_prodotto);


        return view('admin.gestione4_malf')
            ->with('id_prodotto', $id_prodotto)
            ->with('malfunzionamenti', $malfunzionamenti);
    }

    public function showGestSol4($id_malfunzionamento) {

        $soluzioni = $this->_PublicModel->getSolutionsDetails($id_malfunzionamento);


        return view('admin.gestione4_sol')
            ->with('id_malfunzionamento', $id_malfunzionamento)
            ->with('soluzioni', $soluzioni);
    }

    public function addMalf4($id_prodotto) {
        return view('admin.nuovo_malf4')
        ->with('id_prodotto', $id_prodotto);
    }

    public function addNewMalf4 (NewMalfunctionRequest $request) {
        $this->_PublicModel->addMalf($request);
        $malfunzionamenti = $this->_PublicModel->getMalfunctionDetails($request->id_prodotto);


        return view('admin.gestione4_malf')
            ->with('id_prodotto', $request->id_prodotto)
            ->with('malfunzionamenti', $malfunzionamenti);
    }

    public function addSol4($id_malfunzionamento) {
        return view('admin.nuova_sol4')
            ->with('id_malfunzionamento', $id_malfunzionamento);
    }

    public function addNewSol4 (NewSolutionRequest $request) {
        $this->_PublicModel->addSol($request);
        $soluzioni = $this->_PublicModel->getSolutionsDetails($request->id_malfunzionamento);


        return view('admin.gestione4_sol')
            ->with('id_malfunzionamento', $request->id_malfunzionamento)
            ->with('soluzioni', $soluzioni);
    }

    public function showMalfModify4($id_malfunzionamento){
        $_PublicModel=new PublicModel;
        $dati_malf= $_PublicModel->getMalfData($id_malfunzionamento);
        return view('admin.modifica_malf4')
            ->with('dati_malf', $dati_malf[0]);
    }

    public function modifyDataMalf4 (NewMalfunctionRequest $request, $id_malfunzionamento){


        $id_prodotto=$this->_PublicModel->setMalfData($request, $id_malfunzionamento);
        $malfunzionamenti = $this->_PublicModel->getMalfunctionDetails($id_prodotto);
        return view('admin.gestione4_malf')
            ->with('id_prodotto', $id_prodotto)
            ->with('malfunzionamenti', $malfunzionamenti);
    }

    public function showSolModify4($id_soluzione){
        $_PublicModel=new PublicModel;
        $dati_sol= $_PublicModel->getSolData($id_soluzione);
        return view('admin.modifica_sol4')
            ->with('dati_sol', $dati_sol[0]);
    }

    public function modifyDataSol4 (NewSolutionRequest $request, $id_soluzione){


        $id_malfunzionamento=$this->_PublicModel->setSolData($request, $id_soluzione);
        $soluzioni = $this->_PublicModel->getSolutionsDetails($id_malfunzionamento);
        return view('admin.gestione4_sol')
            ->with('id_malfunzionamento', $id_malfunzionamento)
            ->with('soluzioni', $soluzioni);
    }

    public function deleteMalf4 ($id_malfunzionamento){
        $id_prodotto=$this->_PublicModel->deleteMalf( $id_malfunzionamento);
        $malfunzionamenti = $this->_PublicModel->getMalfunctionDetails($id_prodotto);
        return view('admin.gestione4_malf')
            ->with('id_prodotto', $id_prodotto)
            ->with('malfunzionamenti', $malfunzionamenti);
    }

    public function deleteSol4 ($id_soluzione){
        $id_malfunzionamento=$this->_PublicModel->deleteSol( $id_soluzione);
        $soluzioni = $this->_PublicModel->getSolutionsDetails($id_malfunzionamento);
        return view('admin.gestione4_sol')
            ->with('id_malfunzionamento', $id_malfunzionamento)
            ->with('soluzioni', $soluzioni);
    }


    public function showFaqAdmin () {
        $_AdminModel=new AdminModel;

        $faq= $_AdminModel->getFaq();
        return view('admin.faq_admin')
            ->with('faq', $faq);
    }

    public function addNewFaq (FaqRequest $request) {
        $this->_AdminModel->addFaq($request);
        return redirect()->route('showFaqAdmin');
    }

    public function showFaqModify($id){
        $_AdminModel=new AdminModel;

        $dati_faq= $_AdminModel->getFaqData($id);
        return view('admin.modifica_faq')
            ->with('dati_faq', $dati_faq[0]);
    }

    public function modifyDataFaq (FaqRequest $request, $id){

        $this->_AdminModel->setFaqData($request, $id);
        return redirect()->route('showFaqAdmin');
    }

    public function deleteFaq ($id){
        $_AdminModel=new AdminModel;

        $_AdminModel->deleteFaqDB($id);

        return redirect()->route('showFaqAdmin');
    }

}
