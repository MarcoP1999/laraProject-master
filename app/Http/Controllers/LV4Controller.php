<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Http\Requests\NewUserRequest;
use App\Models\PublicModel;
use App\Models\UserModel;
use App\Models\AdminModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;


class LV4Controller extends Controller
{

    protected $_AdminModel;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->_AdminModel = new AdminModel;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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

    public function showFormModificaDati(){
        $dati_personali = $this->_AdminModel->getPersonalData(Auth::id());
        return view('admin.form_modifica')
            ->with('info', $dati_personali[0]);
    }

    public function modificaDati(){
        if($_POST['password'] != $_POST['password_confirm']) return redirect()->back()->with('alert', 'Le password non corrispondono.');
        $ok = $this->_AdminModel->setTecnData($_POST);
        if (!$ok) return redirect()->back()->with('alert', 'Modifiche non avvenute. Password precedente sbagliata.');
        else return redirect()->route('admin');
    }

    public function showStaff(){
        $_AdminModel=new AdminModel;

        $staff = $_AdminModel->getStaff();

        return view ('admin.gestione_staff')
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

    public function modifyDataTecn ($id){

        $this->_AdminModel->setTecnData($_POST, $id);
        return redirect()->route('showTecn')->with('alert', 'Modifiche avvenute con successo');
    }

    public function modifyDataStaff ($id){

        $this->_AdminModel->setStaffData($_POST, $id);
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

    public function showFaqAdmin () {
        $_AdminModel=new AdminModel;

        $faq= $_AdminModel->getFaq();
        return view('admin.faq_admin')
            ->with('faq', $faq);
    }

    public function addNewFaq () {
        $this->_AdminModel->addFaq($_POST);
        return redirect()->route('showFaqAdmin');
    }

    public function showFaqModify($id){
        $_AdminModel=new AdminModel;

        $dati_faq= $_AdminModel->getFaqData($id);
        return view('admin.modifica_faq')
            ->with('dati_faq', $dati_faq[0]);
    }

    public function modifyDataFaq ($id){

        $this->_AdminModel->setFaqData($_POST, $id);
        return redirect()->route('showFaqAdmin');
    }

    public function deleteFaq ($id){
        $_AdminModel=new AdminModel;

        $_AdminModel->deleteFaqDB($id);

        return redirect()->route('showFaqAdmin');
    }

}
