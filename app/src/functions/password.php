<?php

namespace App\functions;

function passwordEncrypt(string $password) :string
{
    return password_hash($password, \PASSWORD_BCRYPT);
}

function passwordVerify(string $value, string $password) :bool
{
    return password_verify($value, $password);
}