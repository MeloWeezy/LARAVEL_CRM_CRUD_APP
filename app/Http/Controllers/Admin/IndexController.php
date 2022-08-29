<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Organization;
use App\Models\Account;
use App\Models\Contact;

class IndexController extends Controller
{
    //
    public function index()
    {
        $org_count = Organization::all()->count();
        $acc_count = Account::all()->count();
        $user_count = User::all()->count();
        $cont_count = Contact::all()->count();
        return view('admin.index',compact('user_count','acc_count','org_count','cont_count'));
    }
}
