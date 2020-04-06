<?php
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Domain\Services\Users\IUserService;

namespace Services\Users;

class UserService implements IUserService{
    
    public Object $database;

    function __construct() {
       // $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . './firebase.json');
        $firebase = (new Factory)
          // ->withServiceAccount($serviceAccount)
           ->withDatabaseUri('https://phpddd-827dc.firebaseio.com/')
           ->create();
        $this->database = $firebase->getDatabase();
    }

    public function post()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input);
        $postRef = $this->database->getReference('user')->push($data);
        $postKey = $postRef->getKey(); 
        echo $postKey;
    }

    public function get(){
        echo json_encode($this->database->getReference('user')
        ->getChildKeys());
    }
    
}