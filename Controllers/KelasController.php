<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $kelases = Kelas::latest()->paginate(10);
        return view('kelas.index', compact('kelases'));
    }

    /**
* create
*
* @return void
*/
public function create()
{
    return view('kelas.create');
}


/**
* store
*
* @param  mixed $request
* @return void
*/
public function store(Request $request)
{
    $this->validate($request, [
        'nama_kelas'     => 'required',
        'kompetensi_keahlian'   => 'required'
    ]);

    $kelas = Kelas::create([
        'nama_kelas'     => $request->nama_kelas,
        'kompetensi_keahlian'   => $request->kompetensi_keahlian
    ]);

    if($kelas){
        //redirect dengan pesan sukses
        return redirect()->route('kelas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('kelas.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
}

    /**
     * edit
     *
     * @param  mixed $kelas
     * @return void
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $kelas
     * @return void
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kelas'     => 'required',
            'kompetensi_keahlian' => 'required'
        ]);

        //get data Kelas by ID
        $kelas = Kelas::findOrFail($id);

        $kelas->update([
            'nama_kelas'     => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
        ]);

        if($kelas){
            //redirect dengan pesan sukses
            return redirect()->route('kelas.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('kelas.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
    
     /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        if($kelas){
            //redirect dengan pesan sukses
            return redirect()->route('kelas.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('kelas.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

}
