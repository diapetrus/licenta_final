<?php
/**
 * Created by PhpStorm.
 * User: Dia
 * Date: 5/29/2019
 * Time: 12:31 PM
 */

namespace Entities;


class HistoryEntity
{

    private $idh;
    private $idu;
    private $totalprice;
    private $date;

    public function __construct($param)
    {
        foreach ($param as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * @return mixed
     */
    public function getIdh()
    {
        return $this->idh;
    }

    /**
     * @param mixed $idh
     */
    public function setIdh($idh)
    {
        $this->idh = $idh;
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
    public function getTotalprice()
    {
        return $this->totalprice;
    }

    /**
     * @param mixed $totalprice
     */
    public function setTotalprice($totalprice)
    {
        $this->totalprice = $totalprice;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
}