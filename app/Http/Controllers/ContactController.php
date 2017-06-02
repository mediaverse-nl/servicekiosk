<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact.index');
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
            'Naam => required|min:5',
            'mail => required|email',
            'Bericht => required|min:50'
        ];

        $validator = \Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()
                ->route('contact.index')
                ->withErrors($validator)
                ->withInput();
        }

        /*Mail::send('email.contact.send', ['user' => $request],
            function($m) use ($request){
                $m->from('info@biggirlzbymartje.nl', 'biggirlzbymartje.nl')->cc('info@biggirlzbymartje.nl');
                $m->to($request->mail, $request->Naam)->subject('Contactform');
            }
        );*/

        \Session::flash('succes_message','Uw bericht is verzonden.');

        return redirect()->route('contact.index');
    }
}
