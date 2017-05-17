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
        $this->middleware('token')->except('authenticate');
        $this->api = Auth::guard('api');
    }

    public function loadButton(Request $request)
    {




        $response = [
            'status' => 200,
            'response' => [
                'user' => $this->api->user(),
                'erer' => $request->all(),
            ],
        ];




        return response()->json($response, 200
//            ,
//            [
//            'headers' => [
//                'Accept' => 'application/json',
//                'Authorization' => 'Bearer token_DXZTvekkKnHMBbfCnrZvgi6YpdFPZFTHiBBsYSy4MVGbx9pkKQV2N',
//            ],
//        ]
        );
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
                    'user' => Auth()->user(),
                ],
            ];
            return response()->json($response);
        }else{
            return response()->json(['error' => ['message' => 'invalid credentials']]);
        }
    }


}
