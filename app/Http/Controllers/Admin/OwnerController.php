<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Typology;

class OwnerController extends Controller
{
    public function index() {
      
        $restaurants = Auth::user()->restaurant;

        $user= Auth::user();

        $typologies= Auth::user()->restaurant -> typologies;

        // $typologies= Typology::all();

        // dd($typologies);
        
        return view('admin.products.dashboard', compact('restaurants', 'user', 'typologies'));
    }
}
