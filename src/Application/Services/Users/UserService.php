<?php
namespace Services\Users;
use Domain\Services\Users\IUserService;
class UserService implements IUserService{
    
    function __construct() {

    }

    public function Add($request) : void
    {
        echo $request;
    }
}