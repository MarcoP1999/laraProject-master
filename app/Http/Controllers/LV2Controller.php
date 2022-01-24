<?php

namespace App\Http\Controllers;

use App\Models\PublicModel;
use App\Models\Resources\Utente;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;


class LV2Controller extends Controller
{

    protected $_UserModel;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->_UserModel = new UserModel;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


}
