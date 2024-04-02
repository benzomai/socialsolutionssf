<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Clients;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*public function index()
    {
        return view('home');
    }*/

    public function userHome() {
        return view ("home", ["msg"=>"I am user role"]);
    }

    public function smmHome() {
        

        return view ("layouts.master", ["msg"=>"I am smm role"]);
    }

    public function adminHome() {
        $clients = Clients::all();

        if($clients ->count() > 0 ) {
            /*return response()->json([
                'status' => 200,
                'clients' => $clients
            ], 200);*/

            return view ("layouts.master", ["msg"=>"I am user role"])->with('clients', $clients);
        } else {
            return response()->json([
                'status' => 404,
                'status_message' => 'No Records Found'
            ], 404);
         }


    }
}
