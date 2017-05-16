<?php

namespace App\Http\Controllers;

use Auth;
use Validator;

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
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        if(Auth::attempt($credentials)){
            $response = [
                'response' => [
                    'logged' => true,
                    'user' => $this->api->user(),
                ],
            ];
            return response()->json($response);
        }else{
            return response()->json(['error' => 'invalid credentials']);
        }
    }


}
