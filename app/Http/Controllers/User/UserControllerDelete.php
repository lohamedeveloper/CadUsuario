<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositorys\User\IUserRepository;
use Illuminate\Http\Request;

class UserControllerDelete extends Controller
{
    protected $users;

    public function __construct(IUserRepository $users)
    {
        $this->users = $users;
    }

    public function index(Request $request)
    {
        $delete= $this->users->destroyById($request->id);
        if($delete){
            $response = [
                'status'=>'ok',
                'success'=>true,
                'message'=>'Registro deletado com sucesso!'
            ];
            return $response;
        }else{
            $response = [
                'status'=>'ok',
                'success'=>false,
                'message'=>'Falha ao excluir registro!'
            ];
            return $response;
        }
    }
}
