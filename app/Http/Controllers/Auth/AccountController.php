<?php

namespace App\Http\Controllers\Auth;

use App\Client;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    protected $user;
    protected $client;

    public function __construct()
    {
        $this->user = new User();
        $this->client = new Client();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('panel.account.index')
            ->with('user', $this->user->find(Auth::user()->id))
            ->with('u', $this->user->find(Auth::user()->id)->client->first());
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'email' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'phonenumber' => 'required',
            'adress' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'companyname' => 'required',
            'kvk' => 'required',
            'vatnumber' => 'required'
        ];

        $validator  = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()
                ->route('panel.account.index')
                ->withErrors($validator)
                ->withInput();
        }

//        $user = $this->user->find($id);
//        $user->email = $request->email;
//        $user->firstname = $request->firstname;
//        $user->lastname = $request->lastname;
//        $user->phonenumber = $request->phonenumber;
//        $user->save();

        $client = $this->client->where('user_id', $id)->first();
        $client->adress = $request->adress;
        $client->zipcode = $request->zipcode;
        $client->city = $request->city;
        $client->companyname = $request->companyname;
        $client->kvk = $request->kvk;
        $client->vatnumber = $request->vatnumber;
        $client->save();

        \Session::flash('success_message', 'Gegevens opgeslagen');

        return redirect()->route('panel.account.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
