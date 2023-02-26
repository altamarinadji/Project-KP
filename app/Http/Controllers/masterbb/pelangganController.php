<?php

namespace App\Http\Controllers\masterbb;

use App\DetailBahan;
use App\Http\Controllers\Controller;
use App\Pesanan;
use App\PesananDetail;
use App\Product;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class pelangganController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = DB::table('users')->where('user_level', '=', '0')->get();
        return view('admin.master_pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
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
        $data = DB::table('users')->where('id', '=', $id)->first();
        return view::make('admin.master_pelanggan.ubah')->with('pelanggan', $data);
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
        
            $data = User::where('users.id', '=', $id)->first();
            $data->name = $request->get('nama');
            $data->email = $request->get('email');
            $data->alamat = $request->get('alamat');
            $data->nohp = $request->get('nohp');
            $data->update();
            session()->flash('message', 'Data Berhasil Diubah');
            return redirect('master_pelanggan');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggan=DB::table('users')->where('id','=',$id);
        $pelanggan->delete();
        $pesanan=DB::table('pesanans')->where('user_id','=',$id)->get();
        foreach($pesanan as $pes){
            $pesanandetail=DB::table('pesanan_details')->where('pesanan_id','=',$pes->id_pesan)->delete();
            $hapuspesan=DB::table('pesanans')->where('id_pesan','=',$pes->id_pesan)->delete();
        }
        
        session()->flash('message', 'Data Telah Dihapus');
        return redirect::to('/master_pelanggan');
    }
}
