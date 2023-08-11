<?php 

namespace App\Repositorys\Contact;

use App\Models\Contact;

interface IContactRepository {

    public function list();
    public function add($collection = []);
    public function findById($id) : Contact;

}