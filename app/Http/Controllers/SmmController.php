<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\Models\Clients;
use App\Models\User;
use App\Models\SMM;
use Illuminate\Support\Facades\DB;
use Auth;

class SmmController extends Controller
{
    public function smmList() {
        $smm = DB::select('SELECT * FROM smm');

        if(count($smm) > 0 ) {

            return View::make('layouts.smm-list')
                ->with('users', $smm);
        } else {
            /*return response()->json([
                'status' => 404,
                'status_message' => 'No Records Found'
            ], 404);*/

            return View::make('layouts.smm-list')
                ->with('users', $smm);
         }
    }
}
