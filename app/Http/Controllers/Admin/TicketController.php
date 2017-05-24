<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{

    protected $ticket;
    protected $message;
    protected $user;

    public function __construct()
    {
        $this->ticket = new Ticket();
        $this->message = new Message();
        $this->user = new User();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.ticket.index')->with('ticket', $this->ticket->orderBy('priority', 'desc')->get());
    }

    public function view($id)
    {
        return view('admin.ticket.view')
            ->with('ticket', $this->ticket->find($id))
            ->with('message', $this->message->where('ticket_id', $id))
            ->with('user', $this->user->where('id', $this->ticket->first()->user_id)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function save(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()
                ->route('admin.ticket.store')
                ->withErrors($validator)
                ->withInput();
        }

        $id = $this->message->latest()->exists() ? $this->message->latest()->first()->id : null;

        $message = $this->message;
        $message->tekst = $request->antwoord;
        $message->user_message_id = $id;
        $message->user_id = $request->uId;
        $message->ticket_id = $request->id;
        $message->status = 'pending';
        $message->save();

        \Session::flash('succes_message','Ticket aangemaakt.');

        return redirect()->route('panel.ticket');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
