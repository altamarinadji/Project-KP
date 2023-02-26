<?php

namespace App\Http\Controllers\masterbb;


use App\Http\Controllers\Controller;
use App\BahanBaku;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class bahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bb = DB::table('bahan_bakus')
        ->join('jenis_bahans', 'jenis_bahans.id_jenis', '=', 'bahan_bakus.jenis_bahan_id')
        ->get();
        
        return view('admin.master_bb.index', compact('bb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis=DB::table('jenis_bahans')->get();
        return view('admin.master_bb.tambah', compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            
            'jenis' => 'required',
            
        ]);
        
        $bb = new BahanBaku;
        $bb->jenis_bahan_id = $request->jenis;
        $bb->nama_bb = $request->nama;
    
        $bb->save();
        session()->flash('message', 'Data Berhasil Ditambahkan');
        return redirect('/master_bb');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = BahanBaku::where('id_pro', $id)->first();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('bahan_bakus')
        ->join('jenis_bahans', 'jenis_bahans.id_jenis', '=', 'bahan_bakus.jenis_bahan_id')
        ->where('id_bb', '=', $id)
        ->first();
      
        $jenis=DB::table('jenis_bahans')->get();
        return view('admin.master_bb.ubah', [
            'bb' => $data,
            'bahan' => $jenis,
            
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
        
            $data = BahanBaku::where('bahan_bakus.id_bb', '=', $id)->first();
            $data->nama_bb = $request->get('nama');
            $data->jenis_bahan_id = $request->get('jenis');
           
            $data->update();
            session()->flash('message', 'Data Berhasil Diubah');
            return redirect('master_bb')->with('msg', 'Berhasil Mengubah Data product');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bahanbaku=DB::table('bahan_bakus')->where('id_bb','=',$id);
        $bahanbaku->delete();

        session()->flash('message', 'Data Telah Dihapus');
        return redirect::to('/master_bb');
    }
}
