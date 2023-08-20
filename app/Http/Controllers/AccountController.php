<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Rules\PasswordSyntax;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreaccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Validation\ValidationException;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccountRequest $request)
    {

        $request->validate([
            
            'email' => 'required|e-mail|max:255',
            'password' => ['required', new PasswordSyntax,'confirmed'],
            'password_confirmation' => 'required',
            'agree' => 'required'
        ]);
        
        
        //
        // $account=new Account();
        // $account->data_id=$request->input('dataid');
        // $account->email= $request->input('email');
        // $account->password= $request->input('password');
        User::create([
            'data_id' => $request->input('dataid'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        // $account->save();
        
        //$request->user()->sendEmailVerificationNotification();
        return redirect()->route('account.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
    
        //
        return view('data.edit_user', ['user' => Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAccountRequest  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountRequest $request, $data)
    {
        $request->validate([
            
            'email' => 'required|e-mail|max:255',
            'password' => ['required', new PasswordSyntax,'confirmed'],
            'password_confirmation' => 'required',
        ]);
        $update=User::findorFail($data);
        
    if (!Hash::check($request->input('old_password'), $update->password)) {
        throw ValidationException::withMessages([
            'old_password' => 'Le mot de passe actuel est incorrect.',
        ]);
    }
        //
        
        $update->email=strip_tags($request->input('email'));
        $update->password=strip_tags($request->input('password'));
        $update->save();
        return redirect()->route('home.info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($data)
    {
    // $delete=User::findorFail($data);
    // $id=$delete->data_id;
    // $delete->delete();
    // return redirect()->route('data.destroy', $id);
    }
}
