<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruangan = DB::table('ruangans')->join('kategori_ruangans', function ($join) {
            $join->on('ruangans.id_kategori_ruangan', '=', 'kategori_ruangans.id_kategori_ruangan');
        })->paginate(5);

        return view('ruangan.index', compact('ruangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_ruangan= DB::table('kategori_ruangans')->get();

        return view('ruangan.add', compact('kategori_ruangan'));
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
            'ruangan_id' => $request->ruangan_id,
            'kode_ruangan'=>$request->kode_ruangan,
            'nama_ruangan' =>  $request->nama_ruangan,
            'id_kategori_ruangan' =>  $request->id_kategori_ruangan,
            'lantai' => $request->lantai,
            'luas' => $request->luas,
            // 'dipakai' => $request->dipakai,
        ];

        $file_photo = $request->file('foto_ruangan');
        $r_dipakai = $request->has('dipakai');

        if($file_photo){
            $nama_file = $request->foto_ruangan->getClientOriginalName() . '-' . time() .
                    '.' . $request->foto_ruangan->extension();

            $request->foto_ruangan->move(public_path('images'), $nama_file);
            $data['foto_ruangan'] = $nama_file;

            // DB::table('ruangans')->where('ruangan_id', $request->ruangan_id)->insert($data);
        }
        // elseif(!$file_photo){
        //     DB::table('ruangans')->where('ruangan_id', $request->ruangan_id)->insert($data);
        // }
        if($r_dipakai){
            $dipakai = $request->input('dipakai')? true : false;
            $data['dipakai'] = $dipakai;
        }
        DB::table('ruangans')->where('ruangan_id', $request->ruangan_id)->insert($data);

        // dd($request->file('foto_inventory'));
        return redirect()->route('ruangan.index')->with('message','Data berhasil ditambah');
    }

    private function _validation(Request $request){
        $validation = $request->validate([
            'kode_ruangan'=> 'required',
            'nama_ruangan' => 'required',
            'id_kategori_ruangan' => 'required',
            'lantai' => 'required',
            'luas' => 'required',
            // 'dipakai' => 'required',

        ],
        [
            'kode_ruangan.required'=>'Harus Diisi',
            'nama_ruangan.required' => 'Harus Diisi',
            'id_kategori_ruangan.required' =>'Harus Diisi',
            'lantai.required' =>'Harus Diisi',
            'luas.required' =>'Harus Diisi',

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
        $data_ruangan = DB::table('ruangans')->where('ruangan_id', $id)->first();
        $ruangan = DB::table('ruangans')->join('kategori_ruangans', function ($join) {
            $join->on('ruangans.ruangan_id', '=', 'kategori_ruangans.id_kategori_ruangan');
        })->first();

        return view('ruangan.detail', compact('data_ruangan','ruangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_ruangan = DB::table('ruangans')->where('ruangan_id', $id)->first();
        $kategori_ruangan= DB::table('kategori_ruangans')->get();

        return view('ruangan.edit', compact('data_ruangan','kategori_ruangan'));
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
            'ruangan_id' => $request->ruangan_id,
            'kode_ruangan'=>$request->kode_ruangan,
            'nama_ruangan' =>  $request->nama_ruangan,
            'id_kategori_ruangan' =>  $request->id_kategori_ruangan,
            'lantai' => $request->lantai,
            'luas' => $request->luas,
        ];

        $file_photo = $request->file('foto_ruangan');
        $r_dipakai = $request->has('dipakai');

        if($file_photo){
            $nama_file = $request->foto_ruangan->getClientOriginalName() . '-' . time() .
                    '.' . $request->foto_ruangan->extension();

            $request->foto_ruangan->move(public_path('images'), $nama_file);
            $data['foto_ruangan'] = $nama_file;
        }

        if($r_dipakai){
            $dipakai = $request->input('dipakai')? true : false;
            $data['dipakai'] = $dipakai;
        }
        DB::table('ruangans')->where('ruangan_id', $request->ruangan_id)->update($data);

        return redirect()->route('ruangan.index')->with('message','Data berhasil diubah');

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

    public function print()
    {
        $ruangan = DB::table('ruangans')->join('kategori_ruangans', function ($join) {
            $join->on('ruangans.id_kategori_ruangan', '=', 'kategori_ruangans.id_kategori_ruangan');
        })->paginate();

        return view('ruangan.cetak', compact('ruangan'));
    }

    public function barangRuangan(){
        $ruangan = DB::table('ruangans')->join('kategori_ruangans', function ($join) {
            $join->on('ruangans.id_kategori_ruangan', '=', 'kategori_ruangans.id_kategori_ruangan');
        })->paginate(5);
        return view('ruangan.barangruangan', compact('ruangan'));
    }
}
