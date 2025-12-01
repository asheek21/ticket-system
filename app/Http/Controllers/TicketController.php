<?php

namespace App\Http\Controllers;

use App\Actions\CreateTicketAction;
use App\Actions\UpdateTicketAction;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Ticket;
use App\Models\TicketType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('ticket.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ticketTypes = TicketType::all();

        return view('ticket.create', compact('ticketTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request, CreateTicketAction $action): RedirectResponse
    {
        $action->execute($request->validated());

        return redirect()->route('home');
    }

    public function edit(Ticket $ticket)
    {
        return view('ticket.edit', compact('ticket'));
    }

    public function update(UpdateTicketRequest $request, Ticket $ticket, UpdateTicketAction $action): RedirectResponse
    {
        $action->execute($ticket, $request->validated());

        return redirect()->route('home');
    }
}
