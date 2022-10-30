<?php

namespace App\Http\Controllers;

use App\Models\userGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserGroupController extends Controller
{
    function join($id)
    {
        $ug = new userGroup();

        $ug->user_id = Auth::user()->id;
        $ug->grupos_id = $id;

        $ug->save();
        return redirect()->back();
    }
}
