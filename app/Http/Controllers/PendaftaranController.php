<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PDF;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('landing-page');
    }


    public function dashboard()
    {
        $data = Pendaftaran::where('id', '=', Auth::user()->id)->get();
        return view('student.dashboard', compact('data'));
    }

    public function Pembayaran()
    {
        $payment = Pembayaran::where('pendaftaran_id', Auth::user()->id)->first();
        return view('student.pembayaran', compact('payment'));      
    }

    public function register()
    {
        return view('pendaftaran.pendaftaran');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createAccount(Request $request)
    {
        $select = $request->AsalSekolah;

        if ($select == "lainnya") {
            $ambil = $request->AsalSekolahLainnya;
        } else {
            $ambil = $request->AsalSekolah;
        }


        $ValidatedData = $request->validate([
            'jenis_kelamin' => 'required',
            'name' => 'required',
            'asal_sekolah' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'no_hp_ayah' => 'required',
            'no_hp_ibu' => 'required',
            'nisn' => 'required|unique:pendaftarans,nisn',
        ]);

        $check = Pendaftaran::create([
            
            'jenis_kelamin' => $request->jenis_kelamin,
            'name' => $request->name,
            'asal_sekolah' => $request->asal_sekolah,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'no_hp_ayah' => $request->no_hp_ayah,
            'no_hp_ibu' => $request->no_hp_ibu,
            'nisn' => $request->nisn,
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->nisn),
            'is_role' => 0
        ]);

        $id = $check['id'];
        $data = [
            'name' =>$request->name,
            'email' => $request->email,
            'password' => $request->nisn,
            'nisn' => $request->nisn,
            'id' => $check->id,
            'asal_sekolah' => $check->asal_sekolah,
            'no_hp' => $check->no_hp,
            'no_hp_ayah' => $check->no_hp_ayah,
            'no_hp_ibu' => $check->no_hp_ibu,
            'created_at' => $check->created_at,
        ];


        return view('pendaftaran.pdf-view', compact('data'));
    }

    public function downloadPdf($id)
    {

        // $id = Crypt::decrypt($id);
        $data = Pendaftaran::where('nisn', $nisn)->first();

        // share data to view
        view()->share('data', $data);
        $pdf = PDF::loadView('pendaftaran.pdf-view', $data);
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }

    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        //
    }
}