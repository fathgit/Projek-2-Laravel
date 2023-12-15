<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;


class EmployeeController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function master(){
        return view('master');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $data = Employee::all();
        $data = Employee::paginate(5);
       
        return view('datapegawai',compact('data'));
    }

    public function tambahpegawai(){
       
        return view('tambahdata');
    }

    public function insertdata(Request $request){
    
        $data = Employee::create($request->all());

        if($request->hasFile('foto')){
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        
        return redirect()->route('pegawai')->with('success','Data Berhasil Di Tambahkan');
    }

    public function tampilkandata($id){
        $data = Employee::find($id);
        
        //dd($data);
        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = Employee::find($id);  
        $data->update($request->all());

        if($request->hasFile('foto')){
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success','Data Berhasil Di Update');
    }

    public function delete($id){
        $data = Employee::find($id);  
        $data->delete();
        return redirect()->route('pegawai')->with('success','Data Berhasil Di Hapus');

    }

    public function search(Request $request){
        
        $search = $request->input('search');
   

        $data = Employee::when($search, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%')
                         ->orWhere('alamat', 'like', '%' . $search . '%');
        })->paginate(5);
        
        //$no = $batas * ($data_buku->currentPage() - 1);
    return view('search', compact('data', 'search'));
    }
}
