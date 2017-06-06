<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\RulesController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Mollie;
use App\Client;

class ClientController extends Controller
{
    protected $mollie;
    protected $client;

    function __construct()
    {
        $this->mollie = Mollie::api();
        $this->client = new Client();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.client.index')->with('clients', $this->client->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create');

//        $subscription = $this->mollie->customers_subscriptions->withParentId("cst_stTC2WHAuS")->create([
//            "amount"      => 25.00,
//            "times"       => 4,
//            "interval"    => "3 months",
//            "description" => "Quarterly payment",
//            "webhookUrl"  => "https://example.org/payments/webhook",
//        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('admin.client.update')->with('client', $this->client->find($id));
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
//        $rules = [
//            'adress' => 'required|max:120',
//            'zipcode' => 'required|min:6|max:6',
//            'city' => 'required|max:80',
//            'companyname' => 'required',
//            'kvk' => 'required|max:30',
//            'vatnumber' => 'required|max:30',
//        ];

        $validator = Validator::make($request->all(), RulesController::ClientAdminUpdate());

        if($validator->fails()){
            return redirect()
                ->route('admin.client.update', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        $client = $this->client->find($id);
        $client->adress;
        $client->zipcode;
        $client->city;
        $client->companyname;
        $client->kvk;
        $client->vatnumber;
        $client->save();

        \Session::flash('success_message', 'Gegevens opgeslagen');

        return redirect()->route('admin.client.update', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = $this->client->find($id);
        $client->delete();

        \Session::flash('success_message', 'Gegevens verwijderd');
        return redirect()->route('admin.client.index');
    }
}
