<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

class ApiController extends Controller
{

    protected $middleware;
    protected $api;

    public function __construct()
    {
//        $this->middleware('auth');
        $this->api = Auth::guard('api');
    }

    public function loadButton()
    {
        $status  = 200;
        $response = [
            'status' => 200,
            'response' => [
                'user' => $this->api->user(),
            ],
        ];

        return response()->json($response, $status);
    }

    public function authenticate(Request $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];
//        $credentials = $request->only('email', 'password');

//        if (Auth::attempt($credentials)) {
            // Authentication passed...
//            return response()->json(Auth::attempt($credentials));
//            return redirect()->intended('dashboard');
//        }
//        Auth::attempt($credentials);

        if(Auth::attempt($credentials)){
            $status  = 200;
            $response = [
                'status' => 200,
                'response' => [

                    'status' => true,
                    'user' => $this->api->user(),
                ],
            ];
            return response()->json($response);
        }else{
            return response()->json(['error' => 'invalid credentials']);
        }

//        return response()->json($response);
    }


}
