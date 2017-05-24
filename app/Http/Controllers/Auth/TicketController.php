<?php

namespace App\Http\Controllers\Auth;

use App\Message;
use App\Role;
use App\Ticket;
use App\User;
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
        $this->user = new User();
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
        $this->ticket = $this->ticket->where('user_id', Auth::user()->id)->orer->get();
        return view('panel.ticket.index')
            ->with('ticket', $this->ticket);
    }

    public function view($id)
    {
//        $this->user = $this->user
//            // pull ticket related to user id
//            ->where('id', $this->user->find(Auth::user()->id)->ticket->first()->user_id)
//            // pull selected ticket ID
//            ->where($this->user->ticket->id, $id)
//            // pull messages related to ticket
//            ->where($this->user->ticket->first()->id, $this->user->message->first()->ticket_id)
//            // check if user is
//            ->where($this->user->userRole->first()->role->account_type, 'admin');
//        $u = $this->user
//            ->where(Auth::user()->id, $this->user->find(Auth::user()->id)->userRole->first()->user_id)
//            ->where(Auth::user()->id, $this->user->find(Auth::user()->id)->ticket->first()->message->first()->user_id)
//            ->where(Auth::user()->id, $this->user->find(Auth::user()->id)->ticket->first()->user_id)
//            ->where($this->user->find(Auth::user()->id)->userRole->first()->role->account_type, 'admin')
//            ->orWhere();

//        $this->message = $this->message
//            ->where('text_id', $id)
//            ->where('user_id', Auth::user()->id)
//            ->where($this->user->userRole->first()->role->account_type, 'admin');
//
//        $admin = $this->user
//            ->where($this->user->userRole->first()->role->account_type, 'admin')->get();
//
//        $u = $this->user->where('id', Auth::user()->id);
//        $this->user = $this->user->where($this->user->userRole()->first()->role->account_type, 'admin');
//        $this->message = $this->message->where('user_id', $this->user->first()->)

        $this->message = $this->message->where('ticket_id', $id)->with('messageChildren');
//        $messageRecursive = $this->message->where('id', $this->message->first()->id);

        return view('panel.ticket.view')
            ->with('message', $this->message)
            ->with('ticket', $this->ticket->find($id))
            ->with('user', $this->user->find(Auth::user()->id));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.ticket.create')->with('p', self::priority());
    }

    public function save(Request $request)
    {
        $rules = [
            'onderwerp' => 'required|min:3',
            'probleem' => 'required|min:10',
            'prioriteit' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('panel.ticket.create')
                ->withErrors($validator)
                ->withInput();
        }

        $ticket = $this->ticket;
        $ticket->user_id = Auth::user()->id;
        $ticket->titel = $request->onderwerp;
        $ticket->text = $request->probleem;
        $ticket->priority = $request->prioriteit;
        $ticket->status = 'pending';
        $ticket->save();

        \Session::flash('succes_message','Ticket aangemaakt.');

        return redirect()->route('panel.ticket');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        $id = $this->message->latest()->exists() ? $this->message->latest()->first()->id : null;

        $message = $this->message;
        $message->tekst = $request->antwoord;
        $message->user_message_id = $id;
        $message->user_id = $request->uId;
        $message->ticket_id = $request->id;
        $message->status = 'pending';
        $message->save();

        $ticket = $this->ticket->find($request->id);
        $ticket->status = 'answered';
        $ticket->save();

        return redirect()->route('panel.view', $request->id);
    }

    public static function priority()
    {
        return collect([
            '0' => 'geen',
            '1' => 'laag',
            '2' => 'redelijk',
            '3' => 'gemiddel',
            '4' => 'hoog',
            '5' => 'heel hoog',
        ]);
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
