<?php

namespace App\Http\Controllers;

use App\Models\portfolio;
use Illuminate\Http\Request;

class AllPortfolioController extends Controller
{
    public function index(){
        $portfolio = portfolio::all();
        return view('portfolio',[
            'portfolio' =>$portfolio,
        ]);
    }
}
