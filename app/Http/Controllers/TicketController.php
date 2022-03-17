<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketDeleteRequest;
use App\Http\Requests\TicketReplyRequest;
use App\Http\Requests\TicketUpdateRequest;
use App\Http\Requests\TicketStoreRequest;
use App\Models\Role;
use App\Models\Ticket;
use App\Models\TicketAnswer;
use App\Models\TicketStatus;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Ticket::class, 'ticket');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $ticketList = Ticket::paginate(25);

        $getOwnTickets = Ticket::where('user_id', '=', Auth::user()->id)->get();

        $ticketStatus = TicketStatus::all();

        return view('tickets.index')->with(['ticketList'       => $ticketList,
                                                 'getOwnTickets'    => $getOwnTickets,
                                                 'ticketStatus'     => $ticketStatus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TicketStoreRequest $request
     * @return RedirectResponse
     */
    public function store(TicketStoreRequest $request): RedirectResponse
    {
       $request->validated();

       Ticket::create([
           'topic'          => $request->input('topic'),
           'description'    => $request->input('description'),
           'status_id'      => TicketStatus::IN_PROGRESS,
           'user_id'        => Auth::user()->id,
       ]);

       return redirect()->back()->with('success', 'Your ticket has been created!');
    }

    /**
     * @throws AuthorizationException
     */
    public function read(Ticket $ticket)
    {
        if (Auth::user()->roles->containsStrict('id', Role::IS_ADMIN) ||
            Auth::user()->roles->containsStrict('id', Role::IS_SUPPORT) ||
            Auth::user()->id === $ticket->user_id)
        {
            $conversation = TicketAnswer::where('ticket_id', '=', $ticket->id)->get();

            return view('tickets.read')->with(['conversation'   => $conversation,
                                                    'ticket'         => $ticket]);
        }

        abort(404);
    }

    /**
     * @param TicketReplyRequest $request
     * @return RedirectResponse
     */

    public function postReply(TicketReplyRequest $request): RedirectResponse
    {
        $request->validated();

        $checkStatus = Ticket::find($request->input('ticket_id'))->status_id;

        if ($checkStatus !== TicketStatus::IN_PROGRESS)
        {
            return redirect()->back();
        }

        TicketAnswer::create([
            'message'   => $request->input('message'),
            'user_id'   => Auth::user()->id,
            'ticket_id' => $request->input('ticket_id'),
        ]);

        return redirect()->back();
    }

    /**
     * @param TicketUpdateRequest $request
     * @param Ticket $ticket
     * @return RedirectResponse
     */
    public function update(TicketUpdateRequest $request, Ticket $ticket): RedirectResponse
    {
        $fields = $request->validated();

        if($request->ajax()) {
            $ticket->fill($fields)->save();

            return redirect()->back()->with([response()->json(["success"=>"true"])]);
        }

        return abort(404);
    }

    public function destroyAll(TicketDeleteRequest $request): RedirectResponse
    {
        $checkedTickets = $request->validated();

        Ticket::whereIn('id', $checkedTickets)->delete();

        return redirect()->back()->with('success', 'Ticket(s) has been deleted.');
    }
}
