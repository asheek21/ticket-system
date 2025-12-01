<?php

namespace App\Http\Controllers;

use App\Actions\CreateTicketTypeAction;
use App\Http\Requests\StoreTicketTypeRequest;
use App\Models\TicketType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TicketTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = TicketType::all();

        return view('ticket-type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ticket-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketTypeRequest $request, CreateTicketTypeAction $action): RedirectResponse
    {
        $action->execute($request->validated());

        return redirect()->route('ticket-type.index')->with('success', 'Ticket type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TicketType $ticketType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TicketType $ticketType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TicketType $ticketType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketType $ticketType)
    {
        //
    }
}
