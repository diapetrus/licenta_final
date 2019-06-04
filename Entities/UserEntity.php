<?php
/**
 * Created by PhpStorm.
 * User: Dia
 * Date: 3/10/2019
 * Time: 7:05 AM
 */

namespace Entities;

class UserEntity
{
    public $idu;
    private $email;
    private $password;
    private $address;
    private $phone;
    private $points;

    public function __construct($params)
    {
        foreach ($params as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * @return mixed
     */
    public function getIdu()
    {
        return $this->idu;
    }

    /**
     * @param mixed $idu
     */
    public function setIdu($idu)
    {
        $this->idu = $idu;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $adress
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param mixed $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

    public function updateSession()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['user'] = $this;
    }

}