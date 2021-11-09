<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory = DB::table('inventory')->join('jenis_barang', function ($join) {
            $join->on('inventory.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang');
        })->paginate(5);
        return view('inventory.inventory', compact('inventory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $jenis_barang = DB::table('jenis_barang')->get();
        return view('inventory.add', compact('jenis_barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_validation($request);

        $data = [
            'id_inventory' => $request->id_inventory,
            'nama_inventory'=>$request->nama_inventory,
            'no_kwitansi' =>  $request->no_kwitansi,
            'vendor' =>  $request->vendor,
            'harga' => $request->harga,
            'id_jenis_barang' => $request->id_jenis_barang,
            'tgl_perolehan' => $request->tgl_perolehan,
            'tgl_pembukuan' => $request->tgl_pembukuan,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
        ];

        $file_photo = $request->file('foto_inventory');

        if($file_photo){
            $nama_file = $request->foto_inventory->getClientOriginalName() . '-' . time() .
                    '.' . $request->foto_inventory->extension();
            
            $request->foto_inventory->move(public_path('images'), $nama_file);
            $data['foto_inventory'] = $nama_file;
        }
        // elseif(!$file_photo){
        //     DB::table('inventory')->where('id_inventory', $request->id_inventory)->insert($data);
        // }
        
        DB::table('inventory')->where('id_inventory', $request->id_inventory)->insert($data);
        return redirect()->route('inventory.index')->with('message','Data berhasil ditambah');
    }

    private function _validation(Request $request){
        $validation = $request->validate([
            // 'id_inventory' => 'required',
            'nama_inventory'=>'required',
            'no_kwitansi' =>'required',
            'vendor' =>'required',
            'harga' =>'required',
            'id_jenis_barang' =>'required',
            'tgl_perolehan' =>'required',
            'tgl_pembukuan' =>'required',
            'jumlah' =>'required',
            'satuan' => 'required',
            'foto_inventory' => 'nullable',
        ],
        [
            // 'id_inventory.required' => 'Harus Diisi',
            'nama_inventory.required'=>'Harus Diisi',
            'no_kwitansi.required' => 'Harus Diisi',
            'vendor.required' =>'Harus Diisi',
            'harga.required' =>'Harus Diisi',
            'id_jenis_barang.required' =>'Harus Diisi',
            'tgl_perolehan.required' =>'Harus Diisi',
            'tgl_pembukuan.required' =>'Harus Diisi',
            'jumlah.required' =>'Harus Diisi',
            'satuan.required' => 'Harus Diisi',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventory = DB::table('inventory')->where('id_inventory', $id)->first();
        $jenis_barang = DB::table('inventory')->join('jenis_barang', function ($join) {
            $join->on('inventory.id_inventory', '=', 'jenis_barang.id_jenis_barang');
        })->first();

        return view('inventory.detail', compact('inventory','jenis_barang'));
    }

    public function print()
    {
        $inventory = DB::table('inventory')->join('jenis_barang', function ($join) {
            $join->on('inventory.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang');
        })->paginate();
        return view('inventory.cetak', compact('inventory'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang= DB::table('inventory')->where('id_inventory', $id)->first();
        $data_barang = DB::table('inventory')->join('jenis_barang', function ($join) {
            $join->on('inventory.id_jenis_barang', '=', 'jenis_barang.id_jenis_barang');
        })->first();
        $kategori= DB::table('jenis_barang')->get();

        return view('inventory.edit', compact ('barang', 'data_barang', 'kategori'));
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
        $this->_validation($request);

        $data = [
            'id_inventory' => $request->id_inventory,
            'nama_inventory'=>$request->nama_inventory,
            'no_kwitansi' =>  $request->no_kwitansi,
            'vendor' =>  $request->vendor,
            'harga' => $request->harga,
            'id_jenis_barang' => $request->id_jenis_barang,
            'tgl_perolehan' => $request->tgl_perolehan,
            'tgl_pembukuan' => $request->tgl_pembukuan,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
        ];

        $file_photo = $request->file('foto_inventory');

        if($file_photo){
            $nama_file = $request->foto_inventory->getClientOriginalName() . '-' . time() .
                    '.' . $request->foto_inventory->extension();
            
            $request->foto_inventory->move(public_path('images'), $nama_file);
            $data['foto_inventory'] = $nama_file;
        }
        // elseif(!$file_photo){
        //     DB::table('inventory')->where('id_inventory', $request->id_inventory)->insert($data);
        // }
        DB::table('inventory')->where('id_inventory', $request->id_inventory)->update($data);
        return redirect()->route('inventory.index')->with('message','Data berhasil diubah');
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
