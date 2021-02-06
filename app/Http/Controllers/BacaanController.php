<?php

namespace App\Http\Controllers;

use App\Models\Bacaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BacaanController extends Controller
{
    public function index()
    {
        $bacaan = Bacaan::where('user_id',Auth::id())->get();
        return response()->json(['status'=>'success','message'=>'Data Bacaan Terambil','data'=>$bacaan]);
    }

    public function store(Request $request)
    {
        $bacaan = Bacaan::create([
            'user_id' => Auth::id(),
            'awal_surat' => $request->awal_surat,
            'awal_ayat' => $request->awal_ayat,
            'akhir_surat' => $request->akhir_surat,
            'akhir_ayat' => $request->akhir_ayat,
        ]);
        return response()->json(['status'=>'success','message'=>'Data Bacaan Berhasil Diinput','data'=>$bacaan]);
    }

    public function edit($id)
    {
        $bacaan = Bacaan::findOrFail($id);
        return response()->json(['status'=>'success','message'=>'Data Bacaan Terambil','data'=>$bacaan]);
    }

    public function update($id, Request $request)
    {
        $bacaan = Bacaan::findOrFail($id);
        $bacaan->update([
            'awal_surat' => $request->awal_surat,
            'awal_ayat' => $request->awal_ayat,
            'akhir_surat' => $request->akhir_surat,
            'akhir_ayat' => $request->akhir_ayat,
        ]);
        return response()->json(['status'=>'success','message'=>'Data Bacaan Berhasil Diubah','data'=>$bacaan]);
    }

    public function destroy($id)
    {
        Bacaan::destroy($id);
        return response()->json(['status'=>'success','message'=>'Data Bacaan Berhasil Dihapus']);
    }
}
