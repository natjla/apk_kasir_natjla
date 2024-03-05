<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Http\Controllers\delete;
use Illuminate\Http\Request;

class AdminTransaksiDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $produk_id = $request->produk_id;
        $transaksi_id = $request->transaksi_id;


        $td = TransaksiDetail::whereProdukId($produk_id)->whereTransaksiId($transaksi_id)->first();

        $transaksi = Transaksi::find($transaksi_id);
        if ($td == null) {
            $data = [
                'produk_id' => $produk_id,
                'produk_name' => $request->produk_name,
                'transaksi_id' => $transaksi_id,
                'qty' => $request->qty,
                'subtotal' => $request->subtotal,
            ];
            TransaksiDetail::create($data);

            $dt = [
                'total' => $request->subtotal + $transaksi->total
            ];

            $transaksi->update($dt);
        } else {
            $data = [
                'qty' => $td->qty + $request->qty,
                'subtotal' => $request->subtotal + $td->subtotal,
            ];
            $td->update($data);

            $dt = [
                'total' => $request->subtotal + $transaksi->total
            ];

            $transaksi->update($dt);
        }
        return redirect('admin/transaksi/' . $transaksi_id . '/edit');
    }

    function delete()
    {
        $id = request('id');
        $td = TransaksiDetail::find($id);
        $td->delete();

        $transaksi = Transaksi::find($td->transaksi_id);
        $data = [
            'total' => $transaksi->total - $td->subtotal,
        ];
        $transaksi->update($data);

        return redirect()->back();
    }

    function done($id)
    {
        $transaksi = Transaksi::find($id);
        $data = [
            'status' => 'selesai'
        ];
        $transaksi->update($data);
        return redirect('/admin/transaksi');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function nota(Transaksi $id)
    {
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            abort(404);
        }
        $detail = TransaksiDetail::join('produks', 'produks.id', '=', 'transaksi_details.produk_id')
            ->join('transaksis', 'transaksis.id', '=', 'transaksi_details.transaksi_id')
            ->select('transaksi_details.*', 'produks.name', 'transaksis.total')
            ->get();
        return view('admin.transaksi.nota', compact('transaksi', 'detail'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
}
