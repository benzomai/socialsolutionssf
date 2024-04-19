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

class UsersController extends Controller
{
    public function usersList() {
        $users = DB::select('SELECT * FROM users');

        if(count($users) > 0 ) {

            return View::make('layouts.users')
                ->with('users', $users);
        } else {
            /*return response()->json([
                'status' => 404,
                'status_message' => 'No Records Found'
            ], 404);*/

            return View::make('layouts.users')
                ->with('users', $users);
         }

    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'user_type' => 'required|integer',
            'email' => 'unique:users,email,',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ],422 );
        } else {
            $client = User::create([
                'name' => $request->name,
                'user_type' => $request->user_type,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            if($request->user_type == 1) {
                $smmUser = DB::table('users')->latest('created_at')->first();

                $smmAdd = SMM::create([
                    'socmed_user_id' => $smmUser->id,
                    'socmed_description' => 'No description',
                    'socmed_status' => 'active',
                    'client_swap_count' => 0
                ]);

            } else {

                /*return response()->json([
                'status' => 200,
                'message' => $request->all()
                ], 200);*/

                if($client) {
                    //return redirect()->route('home.admin');
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

    public function destroy(Request $request) {
        $user = User::find($request->id);
        

        if($user && Auth::check()) {

            $user->delete();
            $users = DB::select('SELECT * FROM users');
            
            return View::make('layouts.users')
                ->with('users', $users);

        } else {
            return response()->json([
                'status' => 404,
                'message' => "No such client!"
            ], 404);
        }
    }
}
