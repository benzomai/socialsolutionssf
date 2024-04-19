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
        $smm = DB::select('SELECT * FROM smm INNER JOIN users ON smm.socmed_user_id = users.id');

        if($smm) {

            return View::make('layouts.smm-list')
                ->with('smm', $smm);
        } else {
            /*return response()->json([
                'status' => 404,
                'status_message' => 'No Records Found'
            ], 404);*/

            return View::make('layouts.smm-list')
                ->with('smm', $smm);
         }
    }

    public function destroy(Request $request) {
        $user = User::find($request->id);
        

        if($user && Auth::check()) {

            $user->delete();
            DB::table('smm')->where('socmed_user_id','=',$request->id)->delete();

            $smm = DB::select('SELECT * FROM smm');
            
            return View::make('layouts.smm-list')
                ->with('smm', $smm);

        } else {
            return response()->json([
                'status' => 404,
                'message' => "No such client!"
            ], 404);
        }
    }
}
