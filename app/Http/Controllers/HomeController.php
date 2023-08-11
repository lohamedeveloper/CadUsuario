<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositorys\User\IUserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return view('home');
          }
        return Redirect::to("/")->withSuccess('Ops! você não tem acesso');
    }
}
