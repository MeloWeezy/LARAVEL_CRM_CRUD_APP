<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\Contact;
use App\Models\Organization;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        # ToDo: @Melusi I've removed 'all()->' because you're not using the Model data, but only need the count.
        #       Play around with the Contact, Account and User model, see the changes in the DebugBar
        $org_count = Organization::count();
        $acc_count = Account::all()->count();
        $user_count = User::all()->count();
        $cont_count = Contact::all()->count();
        return view('dashboard',compact('user','user_count','acc_count','org_count','cont_count'));
    }
}
