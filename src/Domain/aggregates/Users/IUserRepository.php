<?php
use Users\User;

interface IUserInterface
{
    public function Add(User $user) : void;
    public function Update(User $user) : void;
    public function Remove(User $user) : void;
    public function GetAll() :array;
    public function GetById(int $id) : object;
}

?>