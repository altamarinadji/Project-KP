<?php

namespace App\Http\Controllers\masterbb;


use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class masterproductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('products')->get();
        return view('admin.master_products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master_products.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $triplek="";
        $kaca="";
        $this->validate($request, [
            'nama' => 'required',
           
        ]);
        $data = DB::table('products')->where('kode_produk', '=', $request->kode)->first();
        if($data){
        session()->flash('message', 'Kode Produk Telah Digunakan');
        return redirect('/master_products/create');
        }
        $file = $request->file('gambar_pro');
        $product = new product;
        $product->kode_produk = $request->kode;
        $product->nama_pro = $request->nama;
        $product->Triplek = $request->triplek;
        $product->Kaca= $request->kaca;
        
        
        $product->gambar_pro  = $file->getClientOriginalName();
        $tujuan_upload = 'imageup';
        $file->move($tujuan_upload, $file->getClientOriginalName());
        $product->save();
        session()->flash('message', 'Data Berhasil Ditambahkan');
        return redirect('/master_products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = product::where('id_pro', $id)->first();
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
        $data = DB::table('products')->where('id_pro', '=', $id)->first();
        return view::make('admin.master_products.ubah')->with('product', $data);
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
        $data = product::where('products.id_pro', '=', $id)->first();
        $data->kode_produk = $request->kode;
        $data->nama_pro = $request->get('nama');
        $data->Triplek = $request->triplek;
        $data->Kaca= $request->kaca;
        if ($request->file('gambar_pro')) {
            $file = $request->file('gambar_pro');
            $data->gambar_pro  = $file->getClientOriginalName();
            $tujuan_upload = 'imageup';
            $file->move($tujuan_upload, $file->getClientOriginalName());
        }
        $data->update();
        session()->flash('message', 'Data Berhasil Diubah');
        return redirect('master_products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod=DB::table('products')->where('id_pro', '=', $id);
        $prod->delete();
        $pesanandet=DB::table('pesanan_details')->where('product_id', '=', $id)->get();
        foreach($pesanandet as $pes){
            $pesanandetail=DB::table('pesanan_details')->where('pesanan_id','=',$pes->pesanan_id)->delete();
            $hapuspesan=DB::table('pesanans')->where('id_pesan','=',$pes->pesanan_id)->delete();
        }


        session()->flash('message', 'Data Telah Dihapus');
        return redirect::to('/master_products');
    }
}
