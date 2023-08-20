<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecondController extends Controller
{
    //
   public function index () {
    //view(x): affiche le fichier x.blade.php corespondant dans le resources/views 
        return view('welcome');
    }
    public function about () {
        return view('about');
    }
    public function portfolio () {
        return '<h1>PORTFOLIO PAGE</h1>';
    }
    public function test (){
        $test='this test text';
        return view('test')->with([
            'test'=>$test]);
    }
    public function contact () {
        return view('contact');
    }
    public function getdata (){
        
    }
}
