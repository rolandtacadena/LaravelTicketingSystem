<?php

namespace App\Http\Controllers;

use App\Backlog;
use App\Http\Requests\TicketRequest;
use App\Ticket;
use App\User;
use App\Comment;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class TicketsController extends Controller
{
    /**
     * Displays all Tickets
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function all()
    {
        $tickets = Ticket::latest()->paginate();
        $header = 'All Tickets';
        return view('tickets.index', compact('tickets', 'header'));
    }

    /**
     * Displays the Tickets by the given User id
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tickets_by_user($id)
    {
        $tickets = Ticket::where('user_id', $id)->latest()->paginate(10);
        $header = 'Tickets by ' . User::findOrFail($id)->name;
        return view('tickets.index', compact('tickets', 'header'));
    }

    /**
     * Show a Ticket by Its ID
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.show', compact('ticket', 'comments_for_ticket'));
    }

    /**
     * Load a form to edit a given Ticket
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Actual process of updating Ticket
     *
     * @param $id
     * @param TicketRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->all());
        session()->flash('flash_message', 'You have successfully updated the ticket');
        return redirect()->route('ticket_show', [$ticket]);

    }

    /**
     * Returns the Tickets for a given Backlog ID
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tickets_by_backlog($id)
    {
        $tickets = Ticket::where('backlog_id', $id)->latest()->paginate(10);
        $header = 'Tickets for Backlog ' . Backlog::findOrFail($id)->name;
        return view('tickets.index', compact('tickets', 'header'));
    }

    /**
     * Returns all the Tickets whether they are open/close
     *
     * @param $status
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tickets_by_status($status)
    {
        $tickets = Ticket::where('status', $status)->latest()->paginate(10);
        $header = 'Tickets that are ' . $status;
        return view('tickets.index', compact('tickets', 'header'));
    }

    /**
     * Tickets for a given type
     *
     * @param $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tickets_by_type($type)
    {
        $tickets = Ticket::where('type', $type)->latest()->paginate(10);
        $header =  $type . ' tickets';
        return view('tickets.index', compact('tickets', 'header'));
    }

    /**
     * Tickets for a given prio
     *
     * @param $priority
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tickets_by_priority($priority)
    {
        $tickets = Ticket::where('priority', $priority)->latest()->paginate(10);
        $header =  $priority . ' priority tickets';
        return view('tickets.index', compact('tickets', 'header'));
    }

    /**
     * Loads a form to create Ticket
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if(Auth::user()->is_admin()) {
            return view('tickets.create');
        } else {
            return redirect('/tickets')->with('flash_message', 'You must be a administrator to create a ticket.');
        }
    }

    /**
     * Actual process of storing Ticket
     *
     * @param TicketRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(TicketRequest $request)
    {
        $input = $request->all();
        Ticket::create($input);

        return redirect('/tickets/')->with([
            'flash_message' => 'You have successfully updated the ticket',
            'flash_message_important' => true
        ]);
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $this->authorize('delete-post', $ticket);
        $ticket->delete();
        return redirect('/tickets')->with('flash_message', 'You have successfully deleted the ticket');
    }
}
