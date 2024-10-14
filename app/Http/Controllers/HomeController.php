<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\User;
use App\Models\Peminjaman;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home()
    {
        $data['mobils'] = Mobil::where('status', 'ada')->get(); // Filter cars with status 'ada'
        $data['mobilAda'] = Mobil::where('status', 'Ada')->count(); // Total cars
        $data['mobilDipakai'] = Mobil::where('status', 'Sedang Dipakai')->count(); // Count cars in use
        return view('home', $data);
    }
    public function detail($id)
    {
        $data['detail'] = Mobil::with(['peminjamans'])->find($id);
        return view('detail-mobil', $data);
    }
    public function pinjam($id)
    {
        $mobil = Mobil::findOrFail($id);
        $user = User::where('role', 'karyawan')->get();
        return view('pinjam-mobil', compact('mobil', 'user'));
    }
    public function peminjaman_mobil(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tujuan' => 'required|string|max:255',
            'tanggal_peminjaman' => 'required|date|after_or_equal:today',
            'mobil_id' => 'required|exists:mobil,id',
        ]);

        // Create a new rental entry
        $peminjaman = Peminjaman::create([
            'user_id' => $request->user_id,
            'mobil_id' => $request->mobil_id,
            'tanggal_peminjaman' => Carbon::parse($request->tanggal_peminjaman),
            'tanggal_pengembalian' => null,
            'tujuan' => $request->tujuan,
        ]);

        // Update the status of the mobil
        $mobil = Mobil::find($request->mobil_id);
        $mobil->status = 'Sedang Dipakai'; // or whatever status you want to set
        $mobil->save();

        return redirect('/home')->with('success', 'Peminjaman mobil berhasil!');
    }
    public function dmobil()
    {
        $data['mobils'] = Mobil::all();
        return view('data-mobil', $data);
    }
    public function pengembalian_mobil(Request $request)
    {
        $search = $request->input('search'); // Get search query

        $query = Peminjaman::with(['users', 'mobils'])
            ->whereNull('tanggal_pengembalian');

        // Apply search filter if there's a search query
        if ($search) {
            $query->whereHas('users', function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', '%' . $search . '%');
            })->orWhereHas('mobils', function ($q) use ($search) {
                $q->where('plat_nomor', 'like', '%' . $search . '%');
            });
        }

        $data['peminjaman'] = $query->get();

        return view('peminjaman-mobil', $data);
    }

    public function updateReturnDate($id)
{
    $peminjaman = Peminjaman::findOrFail($id);
    
    // Set the return date to the current date and time
    $peminjaman->tanggal_pengembalian = now();
    
    // Update the status of the vehicle to "Ada"
    $peminjaman->mobils->status = 'Ada'; // Ensure you have the relationship set up
    $peminjaman->mobils->save(); // Save the vehicle status change
    
    $peminjaman->save(); // Save the updated peminjaman record

    return redirect()->back()->with('success', 'Tanggal pengembalian telah diperbarui dan status mobil diubah menjadi Ada.');
}

}
