<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Ticket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('site.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255'
        ]);
    $tiket= Ticket::create([
        'name'=> $request->input('name'),
        'email'=> $request->input('email'),
        'telp'=> $request->input('phone'),
        'ticket_id' =>Str::random(6),
    ]);

        return redirect()->back()->with('message', 'Anda berhasil mendaftar silahkan membawa Tiket ID :'.$tiket->ticket_id);
       
    }
}