<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class CheckinController extends Controller
{
    public function index(){

        return view('tickets.checkin');
    }

    public function check(Request $request){

        $ticket = Ticket::where('ticket_id', $request->ticket_id)->first();

        if ($ticket == null) {
            return redirect()->back()->with('message', 'tiket tidak ditemukan');
        }

        if ($ticket->is_checkin == 1) {
            return redirect()->back()->with('message', 'tiket sudah check in');
        }

        $ticket->is_checkin = 1;
        $ticket->save();

        return view('tickets.detail', ['ticket' => $ticket]);
    }
}
    
