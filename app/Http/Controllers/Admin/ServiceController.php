<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\RulesController;
use App\service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new service();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.service.index')->with('service', $this->service->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $rules = [
//            'name' => 'required',
//            'description' => 'required'
//        ];

        $validator = Validator::make($request->all(), RulesController::ServiceAdminStore());

        if($validator->fails()){
            return redirect()
                ->route('admin.service.create')
                ->withErrors($validator)
                ->withInput();
        }

        $service = $this->service;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->save();

        \Session::flash('succes_message','service gegevens opgeslagen.');

        return redirect()->route('admin.service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.service.view')->with('service', $this->service->find($id));
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
//        $rules = [
//            'name' => 'required',
//            'description' => 'required'
//        ];

        $validator = Validator::make($request->all(), RulesController::ServiceAdminUpdate());

        if($validator->fails()){
            return redirect()
                ->route('admin.service.view', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $service = $this->service->find($id);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->save();

        \Session::flash('succes_message','Service gegevens opgeslagen.');

        return redirect()->route('admin.service.view', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = $this->service->find($id);
        $service->delete();

        \Session::flash('succes_message','Service verwijderd.');

        return redirect()->route('admin.service.index');
    }
}
