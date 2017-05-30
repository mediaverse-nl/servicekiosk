<?php

namespace App\Http\Controllers;

use App\Button;
use App\Console;
use function GuzzleHttp\Psr7\str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

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

    public function postButton(Request $request)
    {
        $rules = [
            'console_id' => 'required',
            'button_id' => 'required',
            'image_link' => 'required',
            'website_link' => 'required',
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
        $button->save();

        $response = [
            'response' => [
                'status' => true,
                'button' => $button,
            ],
        ];

        return response()->json($response, 200);
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

        $console = $this->button
            ->with('buttonChildren')
            ->whereHas('console', function ($q) use ($request) {
                $q->where('imei', $request->header('imei'));
            })
            ->where('button_id', null);

        if($request->exists('parent_id')) {
            $console->where('parent_id', $request->parent_id);
        } else {
            $console->where('parent_id', null);
        }

            $response = [
                'status' => 200,
                'response' => [
                    'consoleButtons' => $console->get(),
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
