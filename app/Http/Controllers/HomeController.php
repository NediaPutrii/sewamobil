<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $dashboardactive = 'active';
        $role = Auth::user()->role;
        if($role=='1'){
            return view('admin.dashboard', ['dashboardactive' => $dashboardactive]);
        }
        if($role=='2'){
            return view('pemilik.dashboard', ['dashboardactive' => $dashboardactive]);
        }
        if($role=='3'){
            
            $mobilactive = 'active';
            // $user = Auth::user()->id;
            // $Mobilku =DB::table('Mobil')->all();
            $mobil = DB::select("SELECT * FROM mobil ");
        
            // $role = Auth::user()->role;
            if($role=='3'){
            return view('penyewa.dashboard', 
                [
                    'mobilactive' => $mobilactive,
                    'mobil' => $mobil
                ]);
            }else{
                return view('error');
            }

            return view('penyewa.dashboard', ['dashboardactive' => $dashboardactive]);
        }
    }
}
