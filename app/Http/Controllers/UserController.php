<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function Post_Register()
    {
        $validator = Validator::make(
                    Input::all(),
                    array(
                    	'name' => 'required',
                        'email' => 'required|email',
                        'password' => 'min:6|confirmed',
                        'password_confirmation' => 'same:password'
                  
                    )
                );
        if ($validator->fails()) {
            return Redirect::to('/register')->withInput(Input::all())->withErrors($validator);
        }
        User::create(array(
                    'name'     => Input::get('name'),
                    'email'    => Input::get('email'),
                    'password' => Hash::make(Input::get('password')),
                    'created_at' => time(),
                    'updated_at' =>time()
                ));

            return Redirect::to('/')->with('message', 'Thanks for registering!');

    }
    public function Edit_Profile()
    {

    	$validator = Validator::make(
                    Input::all(),
                    array(
                    	'name' => 'required',
                        'email' => 'required|email',
                        'password' => 'min:6|confirmed',
                        'password_confirmation' => 'same:password'
                  
                    )
                );
        if ($validator->fails()) {
            return Redirect::to('/profile')->withInput(Input::all())->withErrors($validator);
        }
        User::where('id', Input::get('id'))
        ->update(array(
                    'name'     => Input::get('name'),
                    'email'    => Input::get('email'),
                    'password' => Hash::make(Input::get('password')),
                    'created_at' => time(),
                    'updated_at' =>time()
                ));

            return Redirect::to('/profile')->with('message', 'Info update!');
    }
}