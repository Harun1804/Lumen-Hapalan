<?php

namespace App\Http\Controllers;

use App\Models\Hapalan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HapalanController extends Controller
{
    public function index()
    {
        $hapalan = Hapalan::where('user_id',Auth::id())->get();
        return response()->json(['status'=>'success','message'=>'Data Hapalan Terambil','data'=>$hapalan]);
    }

    public function store(Request $request)
    {
        $hapalan = Hapalan::create([
            'user_id' => Auth::id(),
            'awal_surat' => $request->awal_surat,
            'awal_ayat' => $request->awal_ayat,
            'akhir_surat' => $request->akhir_surat,
            'akhir_ayat' => $request->akhir_ayat,
        ]);
        return response()->json(['status'=>'success','message'=>'Data Hapalan Berhasil Diinput','data'=>$hapalan]);
    }

    public function edit($id)
    {
        $hapalan = Hapalan::findOrFail($id);
        return response()->json(['status'=>'success','message'=>'Data Hapalan Terambil','data'=>$hapalan]);
    }

    public function update($id, Request $request)
    {
        $hapalan = Hapalan::findOrFail($id);
        $hapalan->update([
            'awal_surat' => $request->awal_surat,
            'awal_ayat' => $request->awal_ayat,
            'akhir_surat' => $request->akhir_surat,
            'akhir_ayat' => $request->akhir_ayat,
        ]);
        return response()->json(['status'=>'success','message'=>'Data Hapalan Berhasil Diubah','data'=>$hapalan]);
    }

    public function destroy($id)
    {
        Hapalan::destroy($id);
        return response()->json(['status'=>'success','message'=>'Data Hapalan Berhasil Dihapus']);
    }
}
