<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clients;
use Carbon\Carbon;
use Auth;

class ClientController extends Controller
{
   public function index() {
        $clients = Clients::all();
        $user_type = Auth::user()->user_type;

        if($clients ->count() > 0 ) {
            return response()->json([
                'status' => 200,
                'user_type' => $user_type
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'status_message' => 'No Records Found'
            ], 404);
         }
   }

   public function store(Request $request) {
        $date = Carbon::now();
        $validator = Validator::make($request->all(), [
            'client_name' => 'required',
            'assigned_user' => 'required|numeric',
            'assign_smm' => 'required|numeric',
            'client_email' => 'required|email',
            'plan' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ],422 );
        } else {

            $client = Clients::create([
                'client_name' => $request->client_name,
                'assigned_user' => $request->assigned_user,
                'assign_smm' => $request->assign_smm,
                'client_email' => $request->client_email,
                'date_created' => $date,
                'date_updated' => $date,
                'plan' => $request->plan,
            ]);

            if($client) {
                return redirect()->route('home.admin');
                //return view ("layouts.master", ["msg"=>"I am smm role"]);
                /*return response()->json([
                    'status' => 200,
                    'message' => "Client Created Successfully"
                ], 200);*/
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Something went wrong"
                ], 500);
            }



        }

   }
}
