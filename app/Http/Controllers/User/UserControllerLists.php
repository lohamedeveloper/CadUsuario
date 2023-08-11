<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositorys\User\IUserRepository;

class UserControllerLists extends Controller
{
    protected $users;

    public function __construct(IUserRepository $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        return $this->users->list();
    }
}
