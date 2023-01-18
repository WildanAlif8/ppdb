<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function pembayaran()
    {
        $pendaftaran =  Pendaftaran::with('pembayaran')->get();

        return view('admin.verifikasi-pembayaran', compact('pendaftaran'));
    }

    public function bukti($id)
    {
        $bukti = Pembayaran::where('pendaftaran_id', $id)->first();
        return view('admin.bukti-pembayaran', compact('bukti'));
    }

    public function contact()
    {
        $contact = Contact::all();
        return view('admin.contact', compact('contact'));
    } 

    public function detail()
    {
        return view('admin.detail');
    }

    public function failed($id)
    {
        Pembayaran::where('pendaftaran_id', '=', $id)->update([
            'status' => 'Failed'
        ]);

        return redirect()->back();
    }

    public function success($id)
    {
        Pembayaran::where('pendaftaran_id', '=', $id)->update([
            'status' => 'Success'
        ]);

        return redirect()->back();
    }


    public function ContactUs(Request $request)
    {
        $request->validate([
            'name' => '',
            'email' => '',
            'no_tlpn' => '',
            'message' => '',
        ]);

        $tlpn = substr($request->no_tlpn, 1);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_tlpn' => $tlpn,
            'message' => $request->message,
        ]);


        return redirect('/')->with(['contact' => 'Berhasil']);
    }
}