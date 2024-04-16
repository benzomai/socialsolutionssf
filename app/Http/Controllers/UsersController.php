<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Clients;
use Illuminate\Support\Facades\DB;
use Auth;

class UsersController extends Controller
{
    public function usersList() {
        $clients = DB::select('select * from clients');
        $users = DB::select('SELECT * FROM users INNER JOIN clients ON users.id = clients.assigned_user WHERE clients.assigned_user != ? ', [Auth::user()->id]);

        if(count($clients) > 0 ) {

            return View::make('layouts.users')
                ->with('clients', $clients)
                ->with('users', $users);
        } else {
            /*return response()->json([
                'status' => 404,
                'status_message' => 'No Records Found'
            ], 404);*/

            return View::make('layouts.users')
                ->with('clients', $clients)
                ->with('users', $users);
         }

    }
}
