<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokumenController extends Controller
{
    

    public function dokumen(){
        $data_dokumen = Dokumen::all();
        $data_dokumen = Dokumen::paginate(5);
        return view('dokumen.dokumen', compact('data_dokumen'));
    }

    public function create(){
        $data_dokumen = Dokumen::all();
        return view('dokumen.tambahdokumen');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'dokumen' => 'required|file|mimes:doc,docx,pdf,xls,xlxs,ppt,pptx',
        ]);

        $data_dokumen = New Dokumen;
        $data_dokumen->name = Auth::id();

        if($request->hasFile('dokumen')){
            $request->file('dokumen')->move('datadokumen/', $request->file('dokumen')->getClientOriginalName());
            $data_dokumen->dokumen = $request->file('dokumen')->getClientOriginalName();
            $data_dokumen->save();
        }

        return redirect('/dokumen')->with('success','Data Dokumen Berhasil Di Tambahkan');
    }

    public function destroy($id){
        $data_dokumen = Dokumen::find($id);
        $data_dokumen->delete();
        return redirect('/dokumen');
    }

    public function edit($id){
        $data_dokumen = Dokumen::find($id);
        return view('dokumen.editdokumen', compact('data_dokumen'));
    }

    public function update(Request $request){

        $data_dokumen = New Dokumen;
        $data_dokumen->name = Auth::id();
        

        if($request->hasFile('dokumen')){
            $request->file('dokumen')->move('datadokumen/', $request->file('dokumen')->getClientOriginalName());
            $data_dokumen->dokumen = $request->file('dokumen')->getClientOriginalName();
            $data_dokumen->update();
        }

        return redirect('/dokumen')->with('success','Data Dokumen Berhasil Di Update');
    }

    public function search(Request $request){
        
        $search = $request->input('search');
   

        $data_dokumen = Dokumen::when($search, function ($query, $search) {
            return $query->where('dokumen', 'like', '%' . $search . '%');
        })->paginate(5);
        
        //$no = $batas * ($data_buku->currentPage() - 1);
    return view('dokumen.search2', compact('data_dokumen', 'search'));
    }
}
