<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class LoadTicketController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $page = $request->get('page');
        $search = $request->get('search');

        $data = Ticket::with('ticketType')
            ->when(! empty($search), function ($query) use ($search) {
                return $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orWhere('subject', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10, ['*'], 'page', $page);

        return TicketResource::collection($data);
    }
}
