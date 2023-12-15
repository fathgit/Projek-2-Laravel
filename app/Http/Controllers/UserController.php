<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index(){
        $user = User::paginate(5);
        return view('admin.user.index',compact('user'));
    }

    public function create(){
        return view('admin.user.create');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:20',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:users'
        ]);

        $user = New User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/user')->with('success','Data User Berhasil Di Tambahkan');
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id){

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $user = User::find($id);
        if($request->input('password')){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->level = $request->level;
            $user->password = bcrypt($request->password);

        }
        else{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->level = $request->level;
        }
        $user->update();

        return redirect('/user')->with('success','Data User Berhasil Di Update');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('success','Data User Berhasil Di Hapus');
    }

    public function search(Request $request){
        
        $search = $request->input('search');
   

        $user = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                         ->orWhere('email', 'like', '%' . $search . '%')
                         ->orWhere('level', 'like', '%' . $search . '%');
        })->paginate(5);
        
        //$no = $batas * ($data_buku->currentPage() - 1);
    return view('admin.user.search1', compact('user', 'search'));
    }


}
