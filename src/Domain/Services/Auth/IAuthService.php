<?php

namespace Domain\Services\Auth;

interface IAuthService {
    public function Auth(string $guid, string $email, string $name) : string;
}