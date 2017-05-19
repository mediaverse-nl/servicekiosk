<?php

namespace App\Http\Controllers\Auth;

use App\Message;
use App\Role;
use App\Ticket;
use App\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    protected $ticket;
    protected $userRole;
    protected $role;
    protected $user;
    protected $message;

    public function __construct()
    {
        $this->userRole = new UserRole();
        $this->ticket = new Ticket();
        $this->user = Auth::user();
        $this->role = new Role();
        $this->message = new Message();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->ticket = $this->ticket->where('user_id', Auth::user()->id)->get();
        return view('panel.ticket.index')->with('ticket', $this->ticket);
    }

    public function view($id)
    {
//        $userRole = $this->userRole->role->where('account_type', 'admin');
//        $this->userRole = $this->userRole->user->where('user_id', Auth::user()->id);
        $this->ticket = $this->ticket->where('id', $id)->where('user_id', Auth::user()->id)->get();
        return view('panel.ticket.view')
            ->with('ticket', $this->ticket)
            ->with('role', $this->role->get())
            ->with('userRole', $this->userRole->get())
            ->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());

        $rules = [
            'antwoord' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()
                ->route('panel.view')
                ->withErrors($validator)
                ->withInput;
        }

        $message = $this->message;
        $message->tekst = $request->antwoord;
        $message->user_message_id = $request->uId;
        $message->user_id = Auth::user()->id;
        $message->text_id = $request->id;
        $message->status = 'answered';
        $message->save();

        return view('panel.ticket.view');
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
