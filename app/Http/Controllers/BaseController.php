<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Maintexts;

class BaseController extends Controller
{
    //
	public function getIndex(){
		$all = Products::where('showhide', 'show')
				->orderBy('id', 'DESC')
				->paginate(9);
		return view("index")->with('all', $all);
	}
	public function getStatic($id){
		$text = Maintexts::where('url', $id)->first();
		return view('static')->with('text', $text);
	}
}
