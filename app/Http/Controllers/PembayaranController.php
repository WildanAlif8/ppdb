<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pembayaran(Request $request)
    {

        $request->validate([
            'nama_bank' => 'required',
            'name' => 'required',
            'nominal' => 'required',
            'image' => 'required|image|file|max:3000',
        ]);

        if ($request->nama_bank == 'other') {
            $bank = $request->bank_lainnya;
        } else {
            $bank = $request->nama_bank;
        }

        $pendaftaran = Pendaftaran::where("email", Auth::user()->email)->value("id");

        Pembayaran::create([
            "pendaftaran_id" => $pendaftaran,
            'nama_bank' => $bank,
            'name' => $request->name,
            'nominal' => $request->nominal,
            'image' => $request->file('image')->store('post-image'),
        ]);

        
        return redirect('/dashboard')->with('success', 'Pembayaran telah dilakukan silahkan menunggu admin melakukan validasi');
    }


    public function pembayaran_update(Request $request)
    {
        $request->validate([
            'nama_bank' => 'required',
            'name' => 'required',
            'nominal' => 'required',
            'image' => 'required|image|file|max:3000',
        ]);

        if ($request->nama_bank == 'other') {
            $bank = $request->bank_lainnya;
        } else {
            $bank = $request->nama_bank;
        }

        $pendaftaran = Pendaftaran::where("email", Auth::user()->email)->value("id");

        Pembayaran::where('pendaftaran_id', '=', Auth::user()->id)->update([
            "pendaftaran_id" => $pendaftaran,
            'nama_bank' => $bank,
            'name' => $request->name,
            'nominal' => $request->nominal,
            'image' => $request->file('image')->store('post-image'),
            'status' => 'Pending'
        ]);


        return redirect('/dashboard')->with('success', 'Pembayaran telah dilakukan silahkan menunggu admin melakukan validasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}