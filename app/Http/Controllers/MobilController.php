<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobilkuactive = 'active';
        $user = Auth::user()->id;
        // $Mobilku =DB::table('Mobil')->all();
        $mobilku = DB::select("SELECT * FROM mobil where id_user='$user'");
       
        $role = Auth::user()->role;
        if($role=='2'){
        return view('pemilik.index', 
            [
                'mobilkuactive' => $mobilkuactive,
                'mobilku' => $mobilku
            ]);
        }else{
            return view('error');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Auth::user()->role;
        if($role=='2'){
            return view('pemilik.mobilcreate');
        }else{
            return view('error');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user()->id;

        $mobilku = new Mobil;
        // $Mobilku->id = generateRandomString();
        $mobilku->merek = $request->merek;
        $mobilku->noplat = $request->noplat;
        $mobilku->harga = $request->harga;
        $mobilku->created_at = date('Y-m-d H:i:s');
        $mobilku->id_user = $user;
   
        $mobilku ->save();
        
        if($mobilku){
            return redirect()->route('pemilikindex')
            ->with('success', 'Berhasil Tambah Mobil');
            // ->with('error', 'Gagal Daftar KKN');
        }else{
            return redirect()->route('pemilikindex')
            ->with('error', 'Gagal Tambah Mobil');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobilku = Mobil::where('id_mobil' , $id)->first();
        $mobilkuactive = 'active';
        return view('pemilik.mobiledit', 
        [
            'mobilku' => $mobilku,
            'mobilkuactive' => $mobilkuactive
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Mobil::where('id_mobil',$id)
        ->first();

       
        $post->where('id_mobil',$id)
        ->update([
            'merek' => $request->merek,
            'noplat' => $request->noplat,
            'harga' => $request->harga,
            'status' => $request->status
        ]) ;

      

        if ($post) {
            return redirect()
                ->route('pemilikindex')
                ->with([
                    'success' => 'Mobil has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Mobil::where('id_mobil',$id)
        ->delete();

        if ($post) {
            return redirect()
                ->route('pemilikindex')
                ->with([
                    'success' => 'Mobil has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('pemilikindex')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
