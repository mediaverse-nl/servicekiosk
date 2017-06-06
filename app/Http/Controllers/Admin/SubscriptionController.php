<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\RulesController;
use App\Subscription;
use App\SubscriptionType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    protected $subscriptionType;
    protected $subscription;

    public function __construct()
    {
        $this->subscriptionType = new SubscriptionType();
        $this->subscription = new Subscription();
    }

    public static function dates()
    {
        return collect([
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            '10' => '10',
            '11' => '11',
            '12' => '12',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subscription.index')
            ->with('subscription', $this->subscriptionType->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subscription.create')->with('dates', self::dates());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->discount = $this->addDigits($request->discount);
        $request->price = $this->addDigits($request->price);

        $validator = Validator::make($request->all(), RulesController::SubscriptionAdminStore());

        if($validator->fails()){
            return redirect()
                ->route('admin.subscription.create')
                ->withErrors($validator)
                ->withInput();
        }

        $sub = $this->subscriptionType;
        $sub->name = $request->name;
        $sub->price = str_replace(',', '.', $request->price);
        $sub->discount = $request->discount;
        $sub->duration = $request->duration;
        $sub->save();

        Session::flash('success_message', 'Gegevens opgeslagen');

        return redirect()->route('admin.subscription.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.subscription.view')
            ->with('dates', self::dates())
            ->with('subscription', $this->subscriptionType->find($id));
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
        $request->discount = $this->addDigits($request->discount);
        $request->price = $this->addDigits($request->price);

        $validator = Validator::make($request->all(), RulesController::SubscriptionAdminUpdate());

        if($validator->fails()){
            return redirect()
                ->route('admin.subscription.view', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $sub = $this->subscriptionType->find($id);
        $sub->name = $request->name;
        $sub->price = str_replace(',', '.', $request->price);
        $sub->discount = str_replace(',', '.', $request->discount);
        $sub->duration = $request->duration . ' maanden';
        $sub->save();

        Session::flash('success_message', 'Gegevens opgeslagen');

        return redirect()->route('admin.subscription.view', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub = $this->subscriptionType->find($id);
        $sub->delete();

        Session::flash('success_message', 'Subscription verwijderd');

        return redirect()->route('admin.subscription.index');
    }

    /**
     * Add digits if not present
     *
     * @param int $val
     *
     * @return decimal
    */
    protected function addDigits($val)
    {
        if($val == null || $val == '')
            $val = '0.00';
        else{
            if(!substr($val, strpos($val, '.'))){
                $val .= ".00";
            }
        }

        return $val;
    }
}
