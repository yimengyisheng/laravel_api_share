<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $i= 1/0;
        return $i;
        return auth()->user ();
    }
}
