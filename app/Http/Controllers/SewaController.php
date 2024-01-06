<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Mobil;
use App\Models\Sewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sewakuactive = 'active';
        $user = Auth::user()->id;
        // $Mobilku =DB::table('Mobil')->all();
        $sewaku = DB::select("SELECT * from sewa JOIN mobil on sewa.id_mobil=mobil.id_mobil where sewa.id_user='$user';");
      
       
        $role = Auth::user()->role;
        if($role=='3'){
            
        return view('penyewa.index', 
            [
                'sewakuactive' => $sewakuactive,
                'sewaku' => $sewaku
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
    public function create($id)
    {
        $role = Auth::user()->role;
        $mobil = Mobil::where('id_mobil' , $id)->first();
        return view('penyewa.sewacreate', 
        [
            'mobil' => $mobil
           
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $user = Auth::user()->id;

        $sewa = new Sewa;
        // $sewa->id = generateRandomString();
        $sewa->id_user = $user;
        $sewa->id_mobil = $request->id_mobil;
        $sewa->tanggal_mulai_sewa = $request->tanggal_mulai_sewa;
        $sewa->tanggal_akhir_sewa = $request->tanggal_akhir_sewa;
        $sewa->created_at = date('Y-m-d H:i:s');
       
   
        $sewa ->save();

        $post = Mobil::where('id_mobil',$request->id_mobil)
        ->first();

       
        $post->where('id_mobil',$request->id_mobil)
        ->update([
           
            'status' => 2
        ]) ;
        
        if($sewa){
            return redirect()->route('index')
            ->with('success', 'Berhasil Tambah Mobil');
            // ->with('error', 'Gagal Daftar KKN');
        }else{
            return redirect()->route('index')
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user()->id;
        // $sewaku = DB::select("SELECT * from sewa JOIN mobil on sewa.id_mobil=mobil.id_mobil where sewa.id_user='$user' and sewa.id_mobil='$id'");
        // $sewakuactive = 'active';
        // $role = Auth::user()->role;
        // return $sewaku;
        // if($role=='3'){
            
        //     return view('penyewa.returncar', 
        //         [
        //             'sewakuactive' => $sewakuactive,
        //             'sewaku' => $sewaku
        //         ]);
        //     }else{
        //         return view('error');
        //     }


        $sewaku = Sewa::join('mobil', 'sewa.id_mobil', '=', 'mobil.id_mobil')
        ->where('sewa.id_mobil' , $id)
        ->where('sewa.id_user',$user)
        ->first();
        $sewakuactive = 'active';
        return view('penyewa.returncar', 
        [
            'sewaku' => $sewaku,
            'sewakuactive' => $sewakuactive
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
        // return $request;

        $post = Sewa::where('id_sewa',$id)
        ->first();
        $post->where('id_sewa',$id)
        ->update([
            'tanggal_pengembalian' => $request->tanggal_pengembalian
        ]) ;


        $mobil = Mobil::where('id_mobil',$request->id_mobil)
        ->first();
        $mobil->where('id_mobil',$request->id_mobil)
        ->update([
            'status' => 1
        ]) ;
      

        if ($post&&$mobil) {
            return redirect()
                ->route('sewaindex')
                ->with([
                    'success' => 'Mobil has been returned successfully'
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
        //
    }
}
