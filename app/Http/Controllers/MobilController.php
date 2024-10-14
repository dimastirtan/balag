<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data ['mobil'] = Mobil::all();
        return view('mobil', ($data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data ['mobil'] = Mobil::all();
        return view('mobil-add', ($data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_mobil' => 'required',
            'plat_nomor' => 'required',
            'warna' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);
    
        // Handle the uploaded file
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename); // Move to public/img
        }
    
        // Create the mobil entry
        $data = Mobil::create([
            'nama_mobil' => $request->nama_mobil,
            'plat_nomor' => $request->plat_nomor,
            'warna' => $request->warna,
            'gambar' => $filename, // Store the filename
        ]);
    
        return redirect('/mobil')->with('success', 'Mobil berhasil ditambahkan');
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
        $data['mobil'] = Mobil::findOrFail($id);
        return view('mobil-edit', $data);
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
    $request->validate([
        'nama_mobil' => 'required',
        'plat_nomor' => 'required',
        'warna' => 'required',
        'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        'status'=>'required',
    ]);

    $mobil = Mobil::findOrFail($id);

    // Only update the image if a new one is uploaded
    if ($request->hasFile('gambar')) {
        // Delete the old image if necessary
        if ($mobil->gambar) {
            $oldImagePath = public_path('img/' . $mobil->gambar);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Delete the old image
            }
        }

        $file = $request->file('gambar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('img'), $filename); // Move to public/img
        $mobil->gambar = $filename; // Update the filename
    }

    // Update other fields
    $mobil->nama_mobil = $request->nama_mobil;
    $mobil->plat_nomor = $request->plat_nomor;
    $mobil->warna = $request->warna;
    $mobil->status = $request->status;
    $mobil->save();

    return redirect('/mobil')->with('success', 'Data Berhasil Diubah');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil = Mobil::findOrfail($id);
        $mobil->delete();
        return redirect('/mobil')->withError('Data Berhasil Dihapus');
    }
    public function pilihHari(Request $request)
    {
        $hari = $request->input('tanggal_pinjam');
        
        // Ambil mobil yang tersedia pada hari yang dipilih
        // Asumsi Anda memiliki kolom 'hari_tersedia' yang menyimpan hari-hari mobil tersedia
        $mobils = Mobil::where('hari_tersedia', 'like', "%$hari%")->get();

        // Kirim data mobil dan hari yang dipilih ke tampilan
        return view('/home', compact('mobils', 'hari'));
    }
}
