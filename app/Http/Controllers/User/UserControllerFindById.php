<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositorys\User\IUserRepository;
use Illuminate\Http\Request;

class UserControllerFindById extends Controller
{
    protected $users;

    public function __construct(IUserRepository $users)
    {
        $this->users = $users;
    }

    public function index(Request $request) 
    {
        return $this->users->findById($request->id);
    }
}
