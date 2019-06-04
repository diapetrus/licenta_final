<?php
/**
 * Created by PhpStorm.
 * User: Dia
 * Date: 3/2/2019
 * Time: 6:17 AM
 */

namespace Entities;

class PizzaEntity
{
    private $idp;
    private $titlep;
    private $describep;
    private $imagep;
    private $pricep;

    public function __construct($param)
    {
        foreach ($param as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * @return mixed
     */
    public function getIdp()
    {
        return $this->idp;
    }

    /**
     * @param mixed $idp
     */
    public function setIdp($idp)
    {
        $this->idp = $idp;
    }

    /**
     * @return mixed
     */
    public function getTitlep()
    {
        return $this->titlep;
    }

    /**
     * @param mixed $titlep
     */
    public function setTitlep($titlep)
    {
        $this->titlep = $titlep;
    }

    /**
     * @return mixed
     */
    public function getDescribep()
    {
        return $this->describep;
    }

    /**
     * @param mixed $describep
     */
    public function setDescribep($describep)
    {
        $this->describep = $describep;
    }

    /**
     * @return mixed
     */
    public function getImagep()
    {
        return $this->imagep;
    }

    /**
     * @param mixed $imagep
     */
    public function setImagep($imagep)
    {
        $this->imagep = $imagep;
    }

    /**
     * @return mixed
     */
    public function getPricep()
    {
        return $this->pricep;
    }

    /**
     * @param mixed $pricep
     */
    public function setPricep($pricep)
    {
        $this->pricep = $pricep;
    }
}