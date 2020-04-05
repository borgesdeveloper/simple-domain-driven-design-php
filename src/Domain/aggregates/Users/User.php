<?php

namespace Users;

class User implements UserBase
{
    
    public int $Id;
    public string $Name;

    function __construct($id, $name){
        $this->Id = $id;
        $this->Name = $name;
    }

    public function SetPassword($password) : string{

    }
}
?>