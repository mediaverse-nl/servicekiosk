<?php

namespace App\Http\Controllers;

use App\Button;
use App\Console;
//use function GuzzleHttp\Psr7\str;
use Illuminate\Support\Facades\Auth;
use Validator;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $console;
    protected $button;

    public function __construct()
    {
        $this->middleware('token')->except('authenticate');
        $this->console = new Console();
        $this->button = new Button();
    }

    public function deleteButton(Request $request)
    {
        $rules = [
            'button_id' => 'required'
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $button = $this->button->find($request->button_id);
        if($button) {
            $button->delete();

            $response = [
                'response' => [
                    'status' => true,
                    'button' => 'success',
                ],
            ];
        } else {
            return response()->json(['error' => 'Button does not exist']);
        }

        return response()->json($response, 200);
    }

    public function postButton(Request $request)
    {
        $rules = [
            'console_id' => 'required',
            'image_link' => 'required',
            'name_tag' => 'required',
            'button_type' => 'required',
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $button = $this->button;
        $button->console_id = $request->console_id;
        $button->name_tag = $request->name_tag;
        $button->button_id = $request->button_id;
        $button->website_link = $request->website_link;
        $button->button_type = $request->button_type;
        $button->image_link = $request->image_link;

        $button->save();

        $response = [
            'response' => [
                'status' => true,
                'button' => 'success',
            ],
        ];

        return response()->json($response, 200);
    }

//    public function getImei(Request $request)
//    {
//
//        $rules = [
//            'imei' => 'required',
//        ];
//
//        $validator = Validator::make($request->all(), $rules);
//
//        if ($validator->fails()) {
//            return response()->json(['error' => $validator->errors()]);
//        }
//
//        $console = $this->console->where('imei', $request->get('imei'))->first();
//
//        if ($console) {
//            $response = [
//                'status' => 200,
//                'response' => [
//                    'console' => $console
//                ],
//            ];
//        } else {
//            $response = [
//                'error' => 'Console could not be found'
//            ];
//        }
//
//        return response()->json($response, 200);
//    }

    public function loadButton(Request $request)
    {

//        $rules = [
//    ];
//        $validator = Validator::make($request->all(), $rules);
//
//        if ($validator->fails()) {
//            return response()->json(['error' => $validator->errors()]);
//        }

        $console = $this->button
            ->with('buttonChildren')
            ->whereHas('console', function ($q) use ($request) {
                $q->where('serial_key', $request->get('serial_key'));
            });

        if($request->button_id) {
            $console->where('button_id', $request->button_id);
        } else {
            $console->where('button_id', null);
        }

        $buttons = $console->get();

//        dd($console->toSql());
//        $buttons = [];
//        foreach($rawButtons as $button) {
//
//           $button->image_link = $button->image_link;
//
//           $buttons[] = $button;

//        }

        $response = [
            'status' => 200,
            'response' => [
                'consoleButtons' => $buttons
            ],
        ];

        return response()->json($response, 200);
    }

    public function authenticate(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];



        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        if(Auth::attempt($credentials)) {
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

    public function serialKey(Request $request)
    {
        $credentials = [
            'serial_key' => $request->serial_key,
        ];

        $rules = [
            'serial_key' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $console = Console::where('serial_key', $request->serial_key )->first();

        if($console) {
            $response = [
                'response' => [
                    'logged' => true,
                    'console' => $console,
                ],
            ];

            return response()->json($response);
        } else{
            return response()->json(['error' => ['message' => 'invalid credentials']]);
        }
    }

    private function checkSerialKey($serialKey) {
        $console = Console::where('serial_key', $serialKey )->get();
        if($console) {
            return $console->user === Auth()->user();
        }

        return false;
    }

}
