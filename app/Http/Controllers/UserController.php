<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::where('role','karyawan')->get();
        return view ('user',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data['users'] = User::all();
       return view('user-add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $user = User::create($request->all());
       return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = User::findOrFail($id);
        return view('user-edit', $data);
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
        $user = User::findOrfail($id);
        $user->username = $request->username;
        $user->password = $request->password;
        $user->nip = $request->nip;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->no_telepon = $request->no_telepon;
        $user->save();
        return redirect('/user')->withSuccess('Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $user = User::findOrfail($id);
        $user->delete();
        return redirect('/user')->withError('Data Berhasil Dihapus');
    }
    public function tampil()
    {
        $data['users'] = User::whereIn('role',['admin','petugas'])->get();
        return view ('petugas',$data);
    }

    public function tambah()
    {
       $data['users'] = User::all();
       return view('petugas-add',$data);
    }

    public function kirim(Request $request)
    {
       $user = User::create($request->all());
       return redirect('/petugas');
    }

    public function ubah($id)
    {
        $data['user'] = User::findOrFail($id);
        return view('petugas-edit', $data);
    }

    public function diubah(Request $request, $id)
    {
        $user = User::findOrfail($id);
        $user->username = $request->username;
        $user->password = $request->password;
        $user->nip = $request->nip;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->no_telepon = $request->no_telepon;
        $user->role = $request->role;
        $user->save();
        return redirect('/petugas')->withSuccess('Data Berhasil Diubah');
    }

    public function hapus(string $id)
    {
        $user = User::findOrfail($id);
        $user->delete();
        return redirect('/petugas')->withError('Data Berhasil Dihapus');
    }
}
