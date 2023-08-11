<?php 

namespace App\Repositorys\User;

use App\Models\User;

interface IUserRepository {

    public function list();
    public function add($collection = []);
    public function findById($id) : User;
    public function destroyById($object);

}