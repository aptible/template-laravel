<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index(){
        $db_connected = false;
        $db_message = '';
        try {
            DB::connection()->getPdo();
            $db_connected = true;
        } catch (\Exception $e) {
            $db_message = $e->getMessage();
        }
        return view('welcome',['db_connected'=>$db_connected, 'db_message'=>$db_message]);
    }
}
