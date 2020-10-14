<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
 public function home(){
     return view('home');
 }
 public function contactanos(){
    return view('contactanos');
 }
 public function enviar(){
     return "procesando su mensaje";
 }
}
