<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Repositorys\Contact\IContactRepository;
use Illuminate\Http\Request;

class ContactControllerAdd extends Controller
{
    protected $phones;

    public function __construct(IContactRepository $phones)
    {
        $this->phones = $phones;
    }

    public function index(Request $req)
    {
        $add = $this->phones->add($req);
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
