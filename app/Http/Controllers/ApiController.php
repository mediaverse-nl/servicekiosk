<?php

namespace App\Http\Controllers;

use App\Console;
use Auth;
use function GuzzleHttp\Psr7\str;
use Validator;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $console;

    public function __construct()
    {
        $this->middleware('token')->except('authenticate');
        $this->console = new Console();
    }

    public function postButton(Request $request)
    {
        $rules = [
            'imei' => 'required',
        ];

        $validator = Validator::make($request->header(), $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
    }

    public function loadButton(Request $request)
    {
        $rules = [
            'imei' => 'required',
        ];

        $validator = Validator::make($request->header(), $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $response = [
            'status' => 200,
            'response' => [
                'console' => $this->console->where('imei', $request->header('imei'))->first()->button,
                'buttons' => $this->console->where('imei', $request->header('imei'))->first()->button,
            ],
        ];

        return response()->json($response, 200);
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
