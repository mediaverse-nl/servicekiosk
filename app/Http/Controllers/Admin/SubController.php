<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SubController extends Controller
{
    public function __invoke()
    {
        return view('admin.subs.index');
    }
}
