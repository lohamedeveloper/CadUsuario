<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositorys\User\IUserRepository;
use Illuminate\Http\Request;


class UserControllerAdd extends Controller
{

    protected $users;

    public function __construct(IUserRepository $users)
    {
        $this->users = $users;
    }

    public function index(Request $req)
    {
        $add = $this->users->add($req);
        if(!$add){
            $response = [
                'status'=>'ok',
                'success'=>true,
                'message'=>'Registro criado com sucesso!'
            ];
            return $response;
        }else{
            $response = [
                'status'=>'ok',
                'success'=>false,
                'message'=>'Registro criado falhou!'
            ];
            return $response;
        }
    }
}
