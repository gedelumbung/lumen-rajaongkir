<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('index', ['asu' => 'asu']);
    }

    private function _parse($param){
        return json_decode($param->__get('raw_body'));
    }
}
