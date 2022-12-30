<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Models\laptop;
use App\Models\perusahaan;
use App\Models\transaksi_detail;
use App\Models\transaksi;

class penjualanController extends Controller
{
    public function perusahaan()
    {
        $perusahaan = perusahaan::paginate(10);
        Paginator::useBootstrap();
        return view('perusahaan', compact('perusahaan'));
    }

    public function perusahaan_tambah()
    {
        return view('perusahaan-crud', ['tambah' => 'tambah']);
    }

    public function perusahaan_tambah_submit(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:1|max:255',
            'alamat' => 'required'
        ]);

        $tambah = array(
            'nama' => $request->nama,
            'alamat' => $request->alamat
        );

        perusahaan::create($tambah);

        return redirect()->route('perusahaan');
    }

    public function perusahaan_ubah($id)
    {
        $perusahaan = perusahaan::find($id);
        return view('perusahaan-crud', compact('perusahaan'), ['ubah' => 'ubah']);
    }

    public function perusahaan_ubah_submit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:1|max:255',
            'alamat' => 'required'
        ]);

        $ubah = array(
            'nama' => $request->nama,
            'alamat' => $request->alamat
        );

        $perusahaan = perusahaan::find($id);
        $perusahaan->nama = $request->nama;
        $perusahaan->alamat = $perusahaan->alamat;
        $perusahaan->save();

        return redirect()->route('perusahaan');
    }

    public function perusahaan_hapus($id)
    {
        $perusahaan = perusahaan::find($id);
        $laptop = laptop::where('perusahaan_id', '=', $id)->get();

        if (count($laptop) > 0) {
            return redirect()->route('perusahaan');
        } else {
            $perusahaan->delete();
            return redirect()->route('perusahaan');
        }
    }

    public function laptop()
    {
        $laptop = laptop::paginate(10);
        Paginator::useBootstrap();
        return view('laptop', compact('laptop'));
    }

    public function laptop_detail($id)
    {
        $laptop = laptop::find($id);
        return view('laptop-crud', compact('laptop'), ['detail' => 'detail']);
    }

    public function laptop_tambah()
    {
        $perusahaan = perusahaan::all();
        return view('laptop-crud', compact('perusahaan'), ['tambah' => 'tambah']);
    }

    public function laptop_tambah_submit(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:1|max:255',
            'spesifikasi' => 'required',
            'stok' => 'required|digits_between:1,9',
            'harga' => 'required|digits_between:1,12',
            'gambar' => 'required|file|image|max:8192'
        ]);

        $validatedData['gambar'] = $request->file('gambar')->store('gambar', ['disk' => 'public']);

        $laptop = array(
            'nama' => $request->nama,
            'spesifikasi' => $request->spesifikasi,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'perusahaan_id' => $request->perusahaan,
            'gambar' => $validatedData['gambar']
        );

        laptop::create($laptop);

        return redirect()->route('laptop');
    }

    public function laptop_ubah($id)
    {
        $laptop = laptop::find($id);
        $perusahaan = perusahaan::all();

        return view('laptop-crud', compact('laptop', 'perusahaan'), ['ubah' => 'ubah']);
    }

    public function laptop_ubah_submit($id, Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:1|max:255',
            'spesifikasi' => 'required',
            'stok' => 'required|digits_between:1,9',
            'harga' => 'required|digits_between:1,12',
            'gambar' => 'file|image|max:8192'
        ]);

        $laptop = laptop::find($id);
        $laptop->nama = $request->nama;
        $laptop->spesifikasi = $request->spesifikasi;
        $laptop->stok = $laptop->stok;
        $laptop->harga = $laptop->harga;
        $laptop->perusahaan_id = $request->perusahaan;
        if ($request->gambar) {
            $validatedData['gambar'] = $request->file('gambar')->store('gambar', ['disk' => 'public']);
            $laptop->gambar = $validatedData['gambar'];
        }

        $laptop->save();
        return redirect()->route('laptop');
    }

    public function laptop_hapus($id)
    {
        $laptop = laptop::find($id);
        $transaksi_detail = transaksi_detail::where('laptop_id', '=', $id)->get();

        if (count($transaksi_detail) > 0) {
            return redirect()->route('laptop');
        } else {
            $laptop->delete();
            return redirect()->route('laptop');
        }
    }

    public function transaksi()
    {
        $daftar = transaksi::all();
        foreach ($daftar as $daftars) {
            $detail = transaksi_detail::where('transaksi_id', '=', $daftars->id)->get();
            if (count($detail) == 0 || empty($detail) || !$detail) {
                $daftars->delete();
            }
        }

        $transaksi = transaksi::paginate(10);
        Paginator::useBootstrap();
        return view('transaksi', compact('transaksi'));
    }

    public function transaksi_detail($id)
    {
        $transaksi = transaksi::find($id);
        $transaksi_detail = transaksi_detail::where('transaksi_id', '=', $id)->paginate(10);
        Paginator::useBootstrap();
        return view('transaksi-crud', compact('transaksi', 'transaksi_detail'), ['detail' => 'detail']);
    }

    public function transaksi_detail_laptop($id_transaksi, $id_laptop)
    {
        $transaksi = transaksi::find($id_transaksi);
        $laptop = laptop::find($id_laptop);
        return view('transaksi-crud', compact('transaksi', 'laptop'), ['laptop' => 'laptop']);
    }

    public function transaksi_tambah()
    {
        $perusahaan = perusahaan::all();
        return view('transaksi-crud', compact('perusahaan'), ['tambah' => 'tambah']);
    }

    public function transaksi_tambah_submit(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:1|max:255',
            'no_telepon' => 'required|digits_between:1,12'
        ]);

        $tambah = array(
            'nama' => $request->nama,
            'no_telepon' => $request->no_telepon,
            'total' => 0
        );

        transaksi::create($tambah);
        $transaksi = transaksi::where('nama', '=', $request->nama)->where('no_telepon', '=', $request->no_telepon)->orderBy('created_at', 'desc')->first();
        return redirect()->route('detail-transaksi', ['id' => $transaksi->id]);
    }

    public function detail_transaksi($id)
    {
        $transaksi = transaksi::find($id);
        $transaksi_detail = transaksi_detail::where('transaksi_id', '=', $id)->paginate(10);
        Paginator::useBootstrap();
        return view('detail-transaksi', compact('transaksi', 'transaksi_detail'));
    }

    public function detail_transaksi_tambah($id)
    {
        $transaksi = transaksi::find($id);
        $laptop = laptop::where('stok', '>', '0')->paginate(10);
        Paginator::useBootstrap();
        return view('detail-transaksi-crud', compact('transaksi', 'laptop'), ['index' => 'index']);
    }

    public function detail_transaksi_tambah_laptop($id_transaksi, $id_laptop)
    {
        $transaksi = transaksi::find($id_transaksi);
        $laptop = laptop::find($id_laptop);
        return view('detail-transaksi-crud', compact('transaksi', 'laptop'), ['detail_laptop' => 'detail_laptop']);
    }

    public function detail_transaksi_tambah_submit(Request $request, $id_transaksi, $id_laptop)
    {
        $validatedData = $request->validate([
            'jumlah' => 'required|digits_between:1,9',
        ]);

        $laptop = laptop::find($id_laptop);
        if ($request->jumlah > $laptop->stok) {
            return redirect()->route('detail-transaksi-tambah', $id_transaksi);
        } else {
            $subtotal = $request->jumlah * $laptop->harga;
            $transaksi_detail = array(
                'transaksi_id' => $id_transaksi,
                'laptop_id' => $id_laptop,
                'jumlah' => $request->jumlah,
                'subtotal' => $subtotal
            );
            transaksi_detail::create($transaksi_detail);

            $stok = $laptop->stok - $request->jumlah;
            $laptop->stok = $stok;
            $laptop->save();

            $transaksi = transaksi::find($id_transaksi);
            $total = $transaksi->total;
            $daftar_transaksi_detail = transaksi_detail::where('transaksi_id', '=', $id_transaksi)->get();
            foreach ($daftar_transaksi_detail as $daftar_transaksi_details) {
                $total = $total + $daftar_transaksi_details->subtotal;
            }
            $transaksi->total = $total;
            $transaksi->save();

            return redirect()->route('detail-transaksi', $id_transaksi);
        }
    }
}
