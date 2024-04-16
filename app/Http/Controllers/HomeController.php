<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Clients;
use Illuminate\Support\Facades\DB;
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
        $clients = DB::select('select * from clients');
        $users = DB::select('SELECT * FROM users INNER JOIN clients ON users.id = clients.assigned_user WHERE clients.assigned_user != ? ', [Auth::user()->id]);

        if(count($clients) > 0 ) {

            return View::make('layouts.dashboard')
                ->with('clients', $clients)
                ->with('users', $users);
        } else {
            /*return response()->json([
                'status' => 404,
                'status_message' => 'No Records Found'
            ], 404);*/

            return View::make('layouts.dashboard')
                ->with('clients', $clients)
                ->with('users', $users);
         }


    }
}
