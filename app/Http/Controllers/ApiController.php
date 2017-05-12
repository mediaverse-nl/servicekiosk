<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{

//    protected $middleware;


    public function __construct()
    {

    }

    public function loadButton()
    {
        try{
            $asfaf;

            $status  = 200;
            $response = [
                'status' => 200,
                'response' => [

                ],
            ];

        }catch (Exception $e){
            $status = 404;
            $response = [
                "error" => $e,
                'status' => 200,
            ];
        }finally{
            return response()->json($response, $status);
        }
    }


}
