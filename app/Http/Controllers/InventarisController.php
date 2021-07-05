<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventaris = DB::table('inventaris')->join('ruangans', function ($join) {
            $join->on('inventaris.ruangan_id', '=', 'ruangans.ruangan_id');
        })->paginate(5);
        return view('inventaris.inventaris', compact('inventaris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruangan= DB::table('ruangans')->get();
        // $kondisi= DB::table('inventaris')->whereIn('kondisi')->get();

        return view('inventaris.add', compact('ruangan'));
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
            'id_inventaris' => $request->id_inventaris,
            'kode_inventaris'=>$request->kode_inventaris,
            'nama_inventaris' =>  $request->nama_inventaris,
            'ruangan_id' =>  $request->ruangan_id,
            'nup' => $request->nup,
            'tahun' => $request->tahun,
            'merk' => $request->merk,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
            'kondisi' => $request->kondisi,
            'label' => $request->label,
            'sensus' => $request->sensus,
        ];

        $file_photo = $request->file('foto_inventaris');

        if($file_photo){
            $nama_file = $request->foto_inventaris->getClientOriginalName() . '-' . time() .
                    '.' . $request->foto_inventaris->extension();
            
            $request->foto_inventaris->move(public_path('images'), $nama_file);
            $data['foto_inventaris'] = $nama_file;
        }
        // elseif(!$file_photo){
        //     DB::table('inventaris')->where('id_inventaris', $request->id_inventaris)->insert($data);
        // }

        DB::table('inventaris')->where('id_inventaris', $request->id_inventaris)->insert($data);
        return redirect()->route('inventaris.index')->with('message','Data berhasil ditambah');
    }

    private function _validation(Request $request){
        $validation = $request->validate([
            'kode_inventaris' => 'required',
            'nama_inventaris' => 'required',
            'ruangan_id' =>  'nullable',
            'nup' => 'required',
            'tahun' => 'required',
            'merk' => 'required',
            'harga' => 'nullable',
            'keterangan' => 'required',
            'kondisi' => 'nullable',
            'label' => 'required',
            'sensus' => 'required',
        ],
        [   'kode_inventaris.required' => 'Harus diisi',
            'nama_inventaris.required' => 'Harus diisi',
            // 'ruangan_id.required' => 'Harus diisi',
            'nup.required' => 'Harus diisi',
            'tahun.required' => 'Harus diisi',
            'merk.required' => 'Harus diisi',
            'keterangan.required' => 'Harus diisi',
            // 'kondisi.required' => 'Harus diisi',
            'label.required' => 'Harus diisi',
            'sensus.required' => 'Harus diisi',
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
        
        $data_barang = DB::table('inventaris')->where('id_inventaris', $id)->first();
        $data_ruangan = DB::table('inventaris')->join('ruangans', function ($join) {
            $join->on('inventaris.ruangan_id', '=', 'ruangans.ruangan_id');
        })->first();
        return view('inventaris.detail', compact('data_barang', 'data_ruangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_barang = DB::table('inventaris')->where('id_inventaris', $id)->first();
        $data_ruangan = DB::table('inventaris')->join('ruangans', function ($join) {
            $join->on('inventaris.ruangan_id', '=', 'ruangans.ruangan_id');
        })->first();
        $ruangan= DB::table('ruangans')->get();

        return view('inventaris.edit', compact('data_barang', 'data_ruangan', 'ruangan'));
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
            'id_inventaris' => $request->id_inventaris,
            'kode_inventaris'=>$request->kode_inventaris,
            'nama_inventaris' =>  $request->nama_inventaris,
            'ruangan_id' =>  $request->ruangan_id,
            'nup' => $request->nup,
            'tahun' => $request->tahun,
            'merk' => $request->merk,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
            'kondisi' => $request->kondisi,
            'label' => $request->label,
            'sensus' => $request->sensus,
        ];

        $file_photo = $request->file('foto_inventaris');

        if($file_photo){
        $nama_file = $request->foto_inventaris->getClientOriginalName() . '-' . time() .
                '.' . $request->foto_inventaris->extension();
        
        $request->foto_inventaris->move(public_path('images'), $nama_file);
        $data['foto_inventaris'] = $nama_file;
        }
        // elseif(!$file_photo){
        //     DB::table('inventaris')->where('id_inventaris', $request->id_inventaris)->update($data);
        // }
        
    DB::table('inventaris')->where('id_inventaris', $request->id_inventaris)->update($data);
        return redirect()->route('inventaris.index')->with('message','Data berhasil diubah');
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print()
    {
        $inventaris = DB::table('inventaris')->join('ruangans', function ($join) {
            $join->on('inventaris.ruangan_id', '=', 'ruangans.ruangan_id');
        })->paginate();
        return view('inventaris.cetak', compact('inventaris'));
    }
}
