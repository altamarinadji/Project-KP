<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cobaController extends Controller
{
    protected function masukadmin()
    {
        if (auth()->user()->user_level == "1") {
            return redirect("/dashboard");
        }elseif(auth()->user()->user_level == "0"){
            return redirect("/");
        }

        return redirect('/');
    }
}
