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
use Redirect;

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
            DB::table('users')->where('id','=',$request->id)->delete();

            $smm = DB::select('SELECT * FROM smm');
            
            return redirect()->back()->with('message',"delete")
                ->with('smm', $smm);

        } else {
            return response()->json([
                'status' => 404,
                'message' => "No such client!"
            ], 404);
        }
    }

    public function updateAsAdmin(Request $request) {

        //Validation for the data
        if(empty($request->updatePassword)) {
            $validator = Validator::make($request->all(), [
                'updateName' => 'required|string|max:191',
                'updateEmail' => 'required|email',
                'updateStatus' => 'required',
                'swapcount' => 'required|numeric'
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'updateName' => 'required|string|max:191',
                'updateEmail' => 'required|email',
                'updateStatus' => 'required',
                'swapcount' => 'required|numeric',
                'updatePassword' => 'required|regex:"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$"'
            ]);
        }

        //check validator
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $smm = DB::table('users')->join('smm','users.id','=','smm.socmed_user_id')->where('smm.socmed_id', $request->updateSmmIDInput)->get();

            if($smm) {
                if(empty($request->updatePassword) && $smm[0]->email === $request->updateEmail) {
                    DB::table('users')
                        ->join('smm','users.id','=','smm.socmed_user_id')
                        ->where('smm.socmed_id', $request->updateSmmIDInput)
                        ->update([
                            'users.name' => $request->updateName,
                            'smm.socmed_status' =>$request->updateStatus,
                            'smm.client_swap_count' =>$request->swapcount
                        ]);

                    return redirect()->back()->with('message',"update");
                        
                } else if(empty($request->updatePassword) && $smm[0]->email !== $request->updateEmail) {
                    DB::table('users')
                        ->join('smm','users.id','=','smm.socmed_user_id')
                        ->where('smm.socmed_id', $request->updateSmmIDInput)
                        ->update([
                            'users.name' => $request->updateName,
                            'smm.socmed_status' =>$request->updateStatus,
                            'smm.client_swap_count' =>$request->swapcount,
                            'users.email' => $request->updateEmail
                        ]);

                    return redirect()->back()->with('message',"update");

                } else if( !empty($request->updatePassword) && $smm[0]->email === $request->updateEmail ) {
                    DB::table('users')
                        ->join('smm','users.id','=','smm.socmed_user_id')
                        ->where('smm.socmed_id', $request->updateSmmIDInput)
                        ->update([
                            'users.name' => $request->updateName,
                            'smm.socmed_status' =>$request->updateStatus,
                            'smm.client_swap_count' =>$request->swapcount,
                            'users.password' => bcrypt($request->inputPassword)
                        ]);

                    return redirect()->back()->with('message',"update");

                } else if( !empty($request->updatePassword) && $smm[0]->email !== $request->updateEmail ) {
                    DB::table('users')
                        ->join('smm','users.id','=','smm.socmed_user_id')
                        ->where('smm.socmed_id', $request->updateSmmIDInput)
                        ->update([
                            'users.name' => $request->updateName,
                            'smm.socmed_status' =>$request->updateStatus,
                            'smm.client_swap_count' =>$request->swapcount,
                            'users.email' => $request->updateEmail,
                            'users.password' => bcrypt($request->inputPassword)
                        ]);

                    return redirect()->back()->with('message',"update");
                }

                else {
                    return response()->json([
                        'status' => 404,
                        'message' => "Error updating the SMM"
                    ], 404);   
                }

            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "No SMM found with this ID",
                    'User ID' => $request->updateSmmIDInput,
                ], 404);
            }
        }

    }
}
