<?php
/**
 * Created by PhpStorm.
 * User: Dia
 * Date: 3/10/2019
 * Time: 7:14 AM
 */

namespace Models;

use Entities\UserEntity;

class UserModel extends BasicModel
{
    public $email;
    public $password;
    public $address;
    public $phone;

    public function __construct()
    {
        parent::__construct();
    }

    public function createUser($email, $password, $address, $phone)
    {
        $permission = $this->isEmailUnique($email);
        if($permission) {
            $query = $this->dsql_connection->dsql();
            $result = $query->table('users')
                ->set('email', $email)
                ->set('password', MD5($password))
                ->set('address', $address)
                ->set('phone', $phone)
                ->insert();
        }
    }

    public function loadByEmail($email)
    {
        $query = $this->dsql_connection->dsql();
        $result = $query->table('users')
            ->where('email', '=', $email)
            ->getRow();
        return new UserEntity(array(
            'idu' => $result['idu'],
            'email' => $result['email'],
            'points' => $result['points']
        ));
    }

    public function isEmailUnique($email)
    {
        $query = $this->dsql_connection->dsql();
        $result = $query->table('users')
            ->where('email', '=', $email)
            ->getRow();
        return empty($result);
    }

    public function isRegistrationValid($email, $password, $passwordConfirmation, $address, $phone)
    {
        $messages = array();
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $messages[] = 'Adresa de e-mail nu este valida';
        }
        if (strlen($password) < 8) {
            $messages[] = 'Parola trebuie sa aiba minim 8 caractere';
        }
        if ($password !== $passwordConfirmation) {
            $messages[] = 'Parolele nu corespund';
        }

        if (!$this->isEmailUnique($email)) {
            $messages[] = 'Adresa de e-mail deja utilizata';
        }

        if (strlen($phone) != 10)
            $messages[] = 'Numarul de telefon trebuie sa fie din 10 cifre';

        set_error_messages($messages);
        return empty($messages);
    }

    public function areValidCredentials($email, $password)
    {
        $query = $this->dsql_connection->dsql();
        $result = $query->table('users')
            ->where('email', '=', $email)
            ->where('password', '=', MD5($password))
            ->get();
        $messages = array();
        if (sizeof($result) !== 1) {
            $messages[] = 'Parola sau e-mail invalide';
        }
        set_error_messages($messages);
        return empty($messages);
    }

    public function logout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        unset($_SESSION['user']);
    }

}
