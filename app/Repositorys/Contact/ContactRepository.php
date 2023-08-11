<?php 

namespace App\Repositorys\Contact;

use App\Models\Contact;

class ContactRepository implements IContactRepository 
{
    public function list(){
        return Contact::where()
                    ->orderBy('id','desc')->get();
    }

    public function add($collection = []){
        $telephone        = new Contact;
        $telephone->telephone  = $collection['telephone'];
        $telephone->save(); 
    }

    public function findById($id) : Contact {
        return Contact::find($id);
    }
}