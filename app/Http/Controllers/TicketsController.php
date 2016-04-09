<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\TicketFormRequest;

use App\Ticket;

class TicketsController extends Controller
{
    //
    
    public function index() {

        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }
    
    public function create(){
        return view('tickets.create');
    }
    
    public function store(TicketFormRequest $request) {
        
        $slug = uniqid();
        $ticket = new Ticket($request->all());
        $ticket->slug = $slug;
        $ticket->save();
        
        return redirect('/book')->with('status', 'Your ticket has been created successfully with a unique id as ' . $slug);
    }

    public function show($slug) {
        
        $ticket = Ticket::whereSlug($slug)->firstOrFail();

        $comments = $ticket->comments()->get();

        return view('tickets.show', compact('ticket', 'comments'));
    }
    
    public function edit($slug) {
        
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        
        return view('tickets.edit', compact('ticket'));        
    }
    
    public function update($slug, TicketFormRequest $request) {
        
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $ticket->update($request->all());
        $ticket->save();
//        return view('welcome');
        return redirect(action('TicketsController@edit', $ticket->slug))->with('status', 'The ticket has been updated! (Slug: ' . $slug . ')');
    }
    
    function destroy($slug) {
        $ticket = Ticket::whereSlug($slug);
        $ticket->delete();
        
        return redirect(action('TicketsController@index'))->with('status', 'The ticket ' . $slug . ' has been deleted.');
    }
}
