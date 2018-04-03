<?php
/**
 * Created by PhpStorm.
 * User: jean-christophe.simo
 * Date: 27/03/2018
 * Time: 11:53
 */

namespace App\services;

use App\structures\Service;

class Client extends Service
{

    public function __construct(\PDO $pdo)
    {
        if (
            isset($_COOKIE['userId'])
            && isset($_COOKIE['userPassword'])
        ) {
            $userIdCookie = $_COOKIE['userId'];
            $userPasswordCookie = $_COOKIE['userPassword'];

            $query = $pdo->prepare(
                "SELECT * FROM users WHERE id=:id"
            );
            $query->bindValue(
                ':id',
                $userIdCookie,
                \PDO::PARAM_STR
            );
            $query->execute();
            $user = $query->fetch(\PDO::FETCH_ASSOC);

            if (
                $user
                && $user['password'] === $userPasswordCookie
            ) {
                $this->login($userIdCookie, $userPasswordCookie);
            }
        } elseif ($this->isLogged()) {
            $query = $pdo->prepare(
                "SELECT * FROM users WHERE id=:id"
            );
            $query->bindValue(
                ':id',
                $_SESSION['userId'],
                \PDO::PARAM_STR
            );
            $query->execute();
            $user = $query->fetch(\PDO::FETCH_ASSOC);
        }
    }

    public function formLogin() {

    }

    function login(int $id, string $password)
    {
        $_SESSION['logged'] = true;
        $_SESSION['userId'] = $id;
        $end = time() + 31536000;
        setcookie('userId', $id, $end);
        setcookie('userPassword', $password, $end);
    }

    function logout()
    {
        $_SESSION['logged'] = false;
        $_SESSION['userId'] = null;
        setcookie('userId', null, 0);
        setcookie('userPassword', null, 0);
    }

    function isLogged(): bool
    {
        return $_SESSION['logged'] ?? false;
    }
}

