<?php 

namespace App\Repositorys\User;

use App\Models\User;
use App\Repositorys\User\IUserRepository;

class UserRepository implements IUserRepository 
{

    protected $user = null;

    public function list()
    {
        return User::where('email','<>','admin@gmail.com')
                    ->orderBy('id','desc')->get();
    }

    public function add($collection = [])
    {
        $user        = new User;
        $user->name  = $collection['name'];
        $user->email = $collection['email'];
        $user->phone = $collection['phone'];
        $user->save(); 
    }

    public function findById($id) : User
    {
        return User::find($id);
    }

    public function destroyById($id)
    {
        return User::find($id)->delete();
    }

}